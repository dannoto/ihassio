<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Horizontal Layouts - Forms | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <?php $this->load->view('comp/header'); ?>

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php $this->load->view('comp/sidebar'); ?>

        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            

            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="mb-3 mt-1">
                <a href="<?= base_url() ?>persona/lista">
                <button class="btn btn-light text-primary border border-0"> <span class="bx bx-left-arrow-alt"></span> VOLTAR    </button>
                </a>
              </div>

              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Persona /</span> Adicionar</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <!-- <h5 class="mb-0">Basic Layout</h5>
                      <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                      <form id="form-add-pessoa">

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">NOME</label>
                          <div class="col-sm-10">
                            <input  type="text" name="nome" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>



                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">CPF</label>
                          <div class="col-sm-10">
                            <input  type="text" name="cpf" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>

                        <div class="row mb-3">
                        <label for="html5-date-input" class="col-md-2 col-form-label">NASCIMENTO</label>
                                                  <div class="col-sm-10">
                          <input  class="form-control" type="date" name="nascimento" value="" id="html5-date-input">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">RG</label>
                          <div class="col-sm-10">
                            <input type="text" name="rg" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">PIS</label>
                          <div class="col-sm-10">
                            <input type="text" name="pis" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">CNS</label>
                          <div class="col-sm-10">
                            <input type="text" name="cns" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>


                        <hr>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">SEXO</label>
                            <div class="col-sm-10">
                                <select name="sexo" class="form-select"  >
                                    <option value="masculino">Masculino</option>
                                    <option value="feminino">Feminino</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">TIPO</label>
                            <div class="col-sm-10">
                                <select   name="tipo" class="form-select"  >
                                    <option  value="pessoa_fisica">Pessoa Física</option>
                                    <option  value="pessoa_juridica">Pessoa Jurídica</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">SIGNO</label>
                            <div class="col-sm-10">
                                <select name="signo" class="form-select"  >
                                <option value="aries">Áries</option>
                                <option value="touro">Touro</option>
                                <option value="gemeos">Gêmeos</option>
                                <option value="cancer">Câncer</option>
                                <option value="leo">Leão</option>
                                <option value="virgem">Virgem</option>
                                <option value="libra">Libra</option>
                                <option value="escorpiao">Escorpião</option>
                                <option value="sagitario">Sagitário</option>
                                <option value="capricornio">Capricórnio</option>
                                <option value="aquario">Aquário</option>
                                <option value="peixes">Peixes</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">ESCOLARIDADE</label>
                            <div class="col-sm-10">
                                <select name="escolaridade" class="form-select">
                                    <option value="fundamental_incompleto">Fundamental Incompleto</option>
                                    <option value="fundamental_completo">Fundamental Completo</option>
                                    <option value="ensino_medio_incompleto">Ensino Médio Incompleto</option>
                                    <option value="ensino_medio_completo">Ensino Médio Completo</option>
                                    <option value="tecnico">Técnico</option>
                                    <option value="graduacao">Graduação</option>
                                    <option value="pos_graduacao">Pós-Graduação</option>
                                    <option value="mestrado">Mestrado</option>
                                    <option value="doutorado">Doutorado</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">NACIONALIDADE</label>
                            <div class="col-sm-10">
                            <select name="nacionalidade" class="form-select">
            <option value="brasil">Brasil</option>
            <option value="usa">Estados Unidos</option>
            <option value="canada">Canadá</option>
            <option value="reino_unido">Reino Unido</option>
            <option value="franca">França</option>
            <option value="alemanha">Alemanha</option>
            <option value="espanha">Espanha</option>
            <option value="italia">Itália</option>
            <option value="japao">Japão</option>
            <option value="australia">Austrália</option>
            <option value="china">China</option>
            <option value="india">Índia</option>
        </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">RAÇA</label>
                            <div class="col-sm-10">
                            <select name="raca" class="form-select">
            <option value="branca">Branca</option>
            <option value="negra">Negra</option>
            <option value="parda">Parda</option>
            <option value="amarela">Amarela</option>
            <option value="indigena">Indígena</option>
            <option value="outra">Outra</option>
        </select>
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">RENDA</label>
                          <div class="col-sm-10">
                            <input type="text" name="renda" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">ESTADO</label>
                            <div class="col-sm-10">
                            <select onchange="getCidades(this.value)" name="estado" id="estado" class="form-select">
                              <option value="">Selecionar</option>
                              <?php foreach($this->admin_model->get_estados() as $e) { ?>
                                <option value="<?=$e->id?>"><?=$e->nome?></option>
                                <?php } ?>
                          </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">CIDADE</label>
                            <div class="col-sm-10">
                            <select name="cidade" id="cidade" class="form-select">
            
                            </select>
                            </div>
                        </div>
                      
                       

                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-block btn-primary">ADICIONAR</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Basic with Icons -->
               
              </div>
            </div>
            <!-- / Content -->


            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <?php $this->load->view('comp/footer'); ?>


    <script>
        function getCidades(estado_id) 
    {

      $.ajax({
                          method: 'POST',
                          url: '<?= base_url() ?>persona/act_get_cidades',
                          data: {estado_id:estado_id},
                          success: function(data) {
                              // var resp = JSON.parse(data)

                                  $('#cidade').html("")
                                  $('#cidade').html(data)
                              
                          },
                          error: function(data) {
                              alert('Ocorreu um erro temporário.');
                          },
                      });

    }


    $('#form-add-pessoa').on('submit', function(e) {
            e.preventDefault()

            var form = $(this).serialize()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>persona/act_add_pessoa',
                data: form,
                success: function(data) {
                    var resp = JSON.parse(data)

                    if (resp.status == "true") {

                        alert('Adicionado com sucesso!')
                        window.location.href = "<?=base_url()?>persona/lista"

                    } else {
                        alert('Erro ao adicionar!')
                    }
                },
                error: function(data) {
                    alert('Ocorreu um erro temporário.');
                },
            });
        })
    </script>

  </body>
</html>