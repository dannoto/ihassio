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

    <title>Editar Produto</title>

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
                <a href="<?= base_url() ?>tungstenio/produtos">
                <button class="btn btn-light text-primary border border-0"> <span class="bx bx-left-arrow-alt"></span> VOLTAR    </button>
                </a>
              </div>
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Produtos /</span> Editar</h4>

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
                      <form id="form-update-produto">

                        <input  type="hidden" required name="produto_id" value="<?= $produto['id'] ?>" class="form-control" id="basic-default-name" placeholder="" />

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">NOME</label>
                          <div class="col-sm-10">
                            <input  type="text" required name="produto_nome" value="<?= $produto['produto_nome'] ?>" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>



                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">IMAGEM</label>
                          <div class="col-sm-10">
                            <input  type="text" required name="produto_imagem" value="<?= $produto['produto_imagem'] ?>" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>

                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">PREÇO</label>
                          <div class="col-sm-10">
                            <input  type="number" required name="produto_preco" value="<?= $produto['produto_preco'] ?>" class="form-control"  placeholder="" />
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">PLATAFORMA</label>
                            <div class="col-sm-10">
                                <select required name="produto_plataforma" class="form-select"  >
                                <option value="">Selecionar </option>

                                <?php foreach ($this->admin_model->get_produto_plataformas() as $c) { ?>

                                    <?php if ($c->id == $produto['produto_plataforma']) { ?>

                                        <option selected value="<?= $c->id ?>"><?= $c->nome ?></option>

                                    <?php } else { ?>

                                        <option value="<?= $c->id ?>"><?= $c->nome ?></option>

                                    <?php } ?>

                                <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">CATEGORIA</label>
                            <div class="col-sm-10">
                                <select  required name="produto_categoria" class="form-select"  >
                                <option value="">Selecionar </option>

                                <?php foreach ($this->admin_model->get_produto_categorias() as $c) { ?>
                                    <?php if ($c->id == $produto['produto_categoria']) { ?>

                                        <option selected value="<?= $c->id ?>"><?= $c->nome ?></option>

                                        <?php } else { ?>

                                        <option value="<?= $c->id ?>"><?= $c->nome ?></option>

                                        <?php } ?>

                                <?php } ?>
                                </select>
                            </div>
                        </div>

                
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">PÁGINA DE VENDAS</label>
                          <div class="col-sm-10">
                            <input type="text" required name="produto_pagina_de_vendas" value="<?= $produto['produto_pagina_de_vendas'] ?>" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">DESCRIÇAO</label>
                          <div class="col-sm-10">
                            <textarea name="produto_descricao" id=""  class="form-control"><?= $produto['produto_descricao'] ?></textarea>
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
    

    $('#form-update-produto').on('submit', function(e) {
            e.preventDefault()

            var form = $(this).serialize()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>tungstenio/act_update_produto',
                data: form,
                success: function(data) {
                    var resp = JSON.parse(data)

                    if (resp.status == "true") {

                        alert(resp.message)
                        window.location.href = "<?= base_url() ?>tungstenio/produtos"

                    } else {
                        alert(resp.message)
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