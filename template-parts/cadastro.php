<?php

/**
 * Como usar:
 * 
 * incluir página
 * get_template_part('template-parts/cadastro');
 * 
 * abrir modal:
 * com <a href="javascript:;" onclick="saibalaCadastroModal.show()">Cadastre-se</a>
*/

// Impedir arquivo de ser incluído duas vezes (pode causar bug)
if (defined('SAIBALA_CADASTRO_MODAL')) return;
define('SAIBALA_CADASTRO_MODAL', true);

// Dependências
wp_enqueue_script('vue', 'https://unpkg.com/vue@3.2.47/dist/vue.global.js');
wp_enqueue_script('vuetify', 'https://unpkg.com/vuetify@3.1.15/dist/vuetify.min.js');
wp_enqueue_style('vuetify', get_stylesheet_directory_uri() . '/assets/dist/css/vuetify.css');
wp_enqueue_style('mdi', 'https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css');
wp_enqueue_script('axios', 'https://unpkg.com/axios@1.3.6/dist/axios.min.js');
wp_enqueue_script('imask', 'https://unpkg.com/imask@6.6.1-alpha.1/dist/imask.min.js');

?>

<div id="section-cadastro-modal-app"  class="section-cadastro-modal">
  <v-dialog
    v-model="dialog"
    fullscreen
    class="section-cadastro-modal-dialog"
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
            <a href="javascript:;" class="section-cadastro-modal--voltar" @click="dialog=false">Voltar Home</a>
            <div class="section-cadastro-modal--title">Olá,<br><strong>Seja bem-vindo</strong></div>
            <br><br>
  
            <v-row no-gutters>
              <v-col cols="12" md="12">
                <div class="section-cadastro-modal--form-field">
                  <div class="section-cadastro-modal--form-field-label">meu nome é</div>
                  <v-text-field
                    placeholder="digite seu nome"
                    v-model="post.name"
                    :error-messages="getError('name')"
                    :hide-details="!getError('name')"
                  ></v-text-field>
                </div>
              </v-col>
  
              <v-col cols="12" md="8">
                <div class="section-cadastro-modal--form-field">
                  <div class="section-cadastro-modal--form-field-label">pronome</div>
                  <v-text-field
                    placeholder='digite seu pronome, exemplo: "ele, dele"'
                    v-model="post.pronoun"
                    :error-messages="getError('pronoun')"
                    :hide-details="!getError('pronoun')"
                  ></v-text-field>
                </div>
              </v-col>
  
              <v-col cols="12" md="4">
                <div class="section-cadastro-modal--form-field">
                  <div class="section-cadastro-modal--form-field-label">idade</div>
                  <v-text-field
                    placeholder="digite sua idade"
                    type="number"
                    v-model="post.age"
                    :error-messages="getError('age')"
                    :hide-details="!getError('age')"
                  ></v-text-field>
                </div>
              </v-col>
  
              <v-col cols="12" md="6">
                <div class="section-cadastro-modal--form-field">
                  <div class="section-cadastro-modal--form-field-label">e-mail</div>
                  <v-text-field
                    placeholder="digite seu email"
                    v-model="post.email"
                    :error-messages="getError('email')"
                    :hide-details="!getError('email')"
                  ></v-text-field>
                </div>
              </v-col>
  
              <v-col cols="12" md="6">
                <div class="section-cadastro-modal--form-field">
                  <div class="section-cadastro-modal--form-field-label">telefone</div>
                  <v-text-field
                    placeholder="digite o número do seu celular"
                    v-model="post.phone"
                    v-imask="['(00) 0000-0000', '(00) 00000-0000']"
                    :error-messages="getError('phone')"
                    :hide-details="!getError('phone')"
                  ></v-text-field>
                </div>
              </v-col>
  
              <v-col cols="12" md="12">
                <div class="section-cadastro-modal--form-field">
                  <div class="section-cadastro-modal--form-field-label">profissão</div>
                  <v-text-field
                    placeholder="escolha sua profissão"
                    v-model="post.profession"
                    :error-messages="getError('profession')"
                    :hide-details="!getError('profession')"
                  ></v-text-field>
                </div>
              </v-col>
  
              <v-col cols="12" md="12">
                <div class="section-cadastro-modal--form-field">
                  <div class="section-cadastro-modal--form-field-label">meta profissional</div>
                  <v-text-field
                    placeholder="escolha sua meta profissional"
                    v-model="post.professional_goal"
                    :error-messages="getError('professional_goal')"
                    :hide-details="!getError('professional_goal')"
                  ></v-text-field>
                </div>
              </v-col>
  
              <v-col cols="12" md="12">
                <div class="section-cadastro-modal--form-field">
                  <div class="section-cadastro-modal--form-field-label">senha</div>
                  <v-text-field
                    placeholder="digite sua senha"
                    type="password"
                    autocomplete="off"
                    v-model="post.password"
                    :error-messages="getError('password')"
                    :hide-details="!getError('password')"
                  ></v-text-field>
                </div>
              </v-col>
  
              <v-col cols="12" md="12">
                <div class="section-cadastro-modal--form-field">
                  <div class="section-cadastro-modal--form-field-label">senha</div>
                  <v-text-field
                    placeholder="digite a mesma senha"
                    type="password"
                    autocomplete="off"
                    v-model="post.password_confirm"
                    :error-messages="getError('password_confirm')"
                    :hide-details="!getError('password_confirm')"
                  ></v-text-field>
                </div>
              </v-col>
            </v-row>
  
            <br>
  
            <v-row align="center">
              <v-col cols="6" md="4">
                <v-checkbox
                  v-model="post.accept_terms"
                  :error-messages="getError('accept_terms')"
                  :hide-details="!getError('accept_terms')"
                >
                  <template #label>
                    <div>
                      aceito os termos de uso <br>
                      <a href="">ler mais</a>
                    </div>
                  </template>
                </v-checkbox>
              </v-col>
  
              <v-col cols="6" md="4">
                <v-checkbox v-model="post.accept_news">
                  <template #label>
                    <div>
                      concordo em receber <br>
                      novidades sobre os produtos <br>
                      <a href="">ler mais</a>
                    </div>
                  </template>
                </v-checkbox>
              </v-col>
  
              <v-col cols="12" md="4">
                <v-btn type="submit" block :loading="loading">
                  <div class="me-3">continuar</div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="134.224" height="20.458" viewBox="0 0 134.224 20.458">
                    <g transform="translate(0 10.229)">
                      <path style="fill:none; stroke:#666; stroke-miterlimit:10; stroke-width:1;" d="M203.952.354,214,10.406h0L203.952,20.458" transform="translate(-80.154 -10.406)"></path>
                      <path style="fill:none; stroke:#666; stroke-width:1;" d="M-38.247,0H95.229" transform="translate(38.247)"></path>
                    </g>
                  </svg>
                </v-btn>  
              </v-col>
            </v-row>
          </v-container>
        </form>
      </v-defaults-provider>
    </template>
  </v-dialog>
</div>

<script>
  let saibalaCadastroModal;
  addEventListener('DOMContentLoaded', (event) => {
    const saibalaCadastroModalApp = {
      methods: {
        show() {
          this.dialog = true;
        },
        async submit() {
          this.loading = true;
          this.error = false;
          try {
            const { data } = await axios.post('<?php echo site_url('/wp-json/saibala/v1/register'); ?>', this.post);
            this.success = data;
            this.post = this.postDefault();
          } catch(err) {
            this.error = err.response.data;
          }
          this.loading = false;
        },
        getError(name) {
          return this.error && this.error.data[name] ? this.error.data[name] : false;
        },
        postDefault() {
          return {
            name: '',
            pronoun: '',
            age: '',
            email: '',
            phone: '',
            profession: '',
            professional_goal: '',
            password: '',
            password_confirm: '',
            accept_terms: false,
            accept_news: true,
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

    saibalaCadastroModal = Vue.createApp(saibalaCadastroModalApp)
      .use(useVuetify)
      .mount('#section-cadastro-modal-app');
  });
</script>

<style>
  .section-cadastro-modal--voltar {
    display: block;
    font-size: 20px;
    font-style: italic;
    text-transform: uppercase;
    text-align: right;
    text-decoration: none;
    color: #000 !important;
  }

  .section-cadastro-modal--title {
    font-family: 'Vinila Compressed';
    text-transform: uppercase;
    font-size: 120px;
    line-height: 95px;
    font-style: italic;
    font-weight: 1;
  }

  .section-cadastro-modal--title strong {
    font-family: inherit;
    font-weight: 400;
    letter-spacing: inherit;
  }

  .section-cadastro-modal--input {
    width: 100%;
    border-bottom: solid 1px #eee;
  }

  .section-cadastro-modal--form-field {
    display: flex;
    align-items: center;
  }

  .section-cadastro-modal--form-field-label {
    font-family: 'Vinila';
    font-size: 48px;
    font-weight: 100;
    white-space: pre;
    padding: 0 10px;
  }
  .section-cadastro-modal--form-field *:nth-child(2) {
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
    color: #00000088;
    font-family: 'Vinila';
    font-weight: 400;
    height: 25px !important;
    padding: 0 !important;
  }
</style>