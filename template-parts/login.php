<?php

/**
 * Como usar:
 * 
 * incluir página
 * get_template_part('template-parts/cadastro');
 * 
 * abrir modal:
 * com <a href="javascript:;" onclick="saibalaLoginModal.show()">Cadastre-se</a>
*/

// Impedir arquivo de ser incluído duas vezes (pode causar bug)
if (defined('SAIBALA_LOGIN_MODAL')) return;
define('SAIBALA_LOGIN_MODAL', true);

// Dependências
wp_enqueue_script('vue', 'https://unpkg.com/vue@3.2.47/dist/vue.global.js');
wp_enqueue_script('vuetify', 'https://unpkg.com/vuetify@3.1.15/dist/vuetify.min.js');
wp_enqueue_style('vuetify', get_stylesheet_directory_uri() . '/assets/dist/css/vuetify.css');
wp_enqueue_style('mdi', 'https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css');
wp_enqueue_script('axios', 'https://unpkg.com/axios@1.3.6/dist/axios.min.js');
wp_enqueue_script('imask', 'https://unpkg.com/imask@6.6.1-alpha.1/dist/imask.min.js');

?>

<div id="section-login-dialog-app"  class="section-login-modal">
  <v-dialog
    v-model="dialog"
    fullscreen
    class="section-login-modal-dialog"
  >
    <template #default>
      <v-defaults-provider
        :defaults="{
          global: {
            variant: 'underlined',
            color: '#00000088',
          },
        }"
      >
        <form @submit.prevent="submit($event)">
          <v-container>
            <a href="javascript:;" class="section-login-modal--voltar" @click="dialog=false">Voltar Home</a>

            <div class="section-login-modal-dialog-limit">
              <div class="section-login-modal--title">Olá,<br><strong>Bom que <br>você voltou</strong></div>
              <br><br>
    
              <v-row no-gutters>
                <v-col cols="12" md="12">
                  <div class="section-login-modal--form-field">
                    <div class="section-login-modal--form-field-label">email</div>
                    <v-text-field
                      placeholder="digite seu email de cadastro"
                      v-model="post.user_login"
                      :error-messages="getError('user_login')"
                      :hide-details="!getError('user_login')"
                      color="#fff"
                    ></v-text-field>
                  </div>
                </v-col>
    
                <v-col cols="12" md="8">
                  <div class="section-login-modal--form-field">
                    <div class="section-login-modal--form-field-label">senha</div>
                    <v-text-field
                      placeholder="digite sua senha"
                      v-model="post.user_password"
                      type="password"
                      :error-messages="getError('user_password')"
                      :hide-details="!getError('user_password')"
                      color="#fff"
                    ></v-text-field>
                  </div>
                </v-col>
  
                <v-col cols="12" md="12" class="pa-3">
                  não tem conta?
                  <a href="javascript:;">cadastre-se agora.</a>
                  esqueceu a senha?
                  <a href="javascript:;">redefina aqui.</a>
                </v-col>
  
                <v-col cols="12" md="12" class="pa-3">
                  <v-btn
                    type="submit"
                    block
                    :loading="loading"
                    color="#ffff00"
                    variant="flat"
                    height="67px"
                    rounded="0"
                  >
                    <div class="me-3">acessar minha conta</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="134.224" height="20.458" viewBox="0 0 134.224 20.458">
                      <g transform="translate(0 10.229)">
                        <path style="fill:none; stroke:#666; stroke-miterlimit:10; stroke-width:1;" d="M203.952.354,214,10.406h0L203.952,20.458" transform="translate(-80.154 -10.406)"></path>
                        <path style="fill:none; stroke:#666; stroke-width:1;" d="M-38.247,0H95.229" transform="translate(38.247)"></path>
                      </g>
                    </svg>
                  </v-btn>
                  
                  <v-alert
                    v-if="error"
                    type="error"
                    class="bg-error mt-3"
                  >
                    <div v-html="error.message || 'Erro desconhecido'"></div>
                  </v-alert>

                  <v-alert
                    v-if="success"
                    type="success"
                    class="bg-success mt-3"
                  >
                    Bem vindo {{ success.data.user_nicename }}
                  </v-alert>
                </v-col>
              </v-row>
            </div>
          </v-container>
        </form>
      </v-defaults-provider>
    </template>
  </v-dialog>
</div>

<script>
  let saibalaLoginModal;
  addEventListener('DOMContentLoaded', (event) => {
    const saibalaLoginModalApp = {
      methods: {
        show() {
          this.dialog = true;
        },
        async submit() {
          this.loading = true;
          this.error = false;
          try {
            const { data } = await axios.post('<?php echo site_url('/wp-json/saibala/v1/login'); ?>', this.post);
            this.success = data;
            this.post = this.postDefault();
            setTimeout(() => {
              location.reload();
            }, 3000);
          } catch(err) {
            this.error = err.response.data;
          }
          this.loading = false;
        },
        getError(name) {
          // return this.error && this.error.data[name] ? this.error.data[name] : false;
        },
        postDefault() {
          return {
            user_login: '',
            user_password: '',
            remember: 1,
          };
        },
      },

      data() {
        return {
          dialog: false,
          loading: false,
          post: this.postDefault(),
          error: false,
          success: false,
        };
      },

      directives: {
        imask: {
          mounted(el, bind, vnode, prevVnode) {
            const input = el.querySelector('input');

            let maskOptions = bind.value || {};
            if (Array.isArray(bind.value)) {
              maskOptions = {
                mask: bind.value.map(mask => {
                  return { mask };
                }),
              };
            }
            else if (typeof bind.value=='string') {
              maskOptions = { mask: bind.value };
            }

            const mask = IMask(input, maskOptions);
          },
        },
      },
    };

    const useVuetify = Vuetify.createVuetify({});

    saibalaLoginModal = Vue.createApp(saibalaLoginModalApp)
      .use(useVuetify)
      .mount('#section-login-dialog-app');
  });
</script>

<style>
  .section-login-modal-dialog {
    background: #000;
    color: #fff;
  }

  .section-login-modal-dialog .section-login-modal-dialog-limit {
    max-width: 622px;
    height: 90vh;
    overflow: auto;
  }

  .section-login-modal--voltar {
    display: block;
    font-size: 20px;
    font-style: italic;
    text-transform: uppercase;
    text-align: right;
    text-decoration: none;
    color: #fff !important;
  }

  .section-login-modal--title {
    font-family: 'Vinila Compressed';
    text-transform: uppercase;
    color: #fff !important;
    font-size: 120px;
    line-height: 95px;
    font-style: italic;
    font-weight: 1;
  }

  .section-login-modal--title strong {
    font-family: inherit;
    font-weight: 400;
    letter-spacing: inherit;
  }

  .section-login-modal--input {
    width: 100%;
    border-bottom: solid 1px #eee;
  }

  .section-login-modal--form-field {
    display: flex;
    align-items: center;
  }

  .section-login-modal--form-field-label {
    font-family: 'Vinila';
    font-size: 48px;
    font-weight: 100;
    white-space: pre;
    padding: 0 10px;
    color: #fff !important;
  }
  .section-login-modal--form-field *:nth-child(2) {
    flex-grow: 1;
  }

  /* Vuetify customization */
  .section-cadastro-modal-dialog .v-overlay__content {
    background: #ff0;
    overflow: auto !important;
  }

  .section-cadastro-modal .v-text-field .v-field__input,
  .section-cadastro-modal .v-select .v-field__input {
    font-size: 18px;
    color: #ffffff;
    font-family: 'Vinila';
    font-weight: 400;
    height: 25px !important;
    padding: 0 !important;
  }

  .section-cadastro-modal .v-text-field .v-field__input::placeholder,
  .section-cadastro-modal .v-select .v-field__input::placeholder {
    font-size: 18px;
    color: #ffffff !important;
    font-family: 'Vinila';
  }
</style>