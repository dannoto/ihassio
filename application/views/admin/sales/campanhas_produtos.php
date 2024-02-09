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

    <title>Lista de Campanhas</title>

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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Campanhas /</span> Lista</h4>

              <!-- Basic Bootstrap Table -->
              <a href="<?= base_url() ?>sales/campanhas_adicionar">
                  <button class="btn btn-primary mt-2 mb-3"  type="button" >+ ADICIONAR</button>
              </a>

              <div class="card">
              <h4></h4>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>TIPO</th>
                        <th>DIVULGAÇAO</th>
                        <th>PROSPECÇAO</th>
                        <th>VENDAS</th>

                        <th>RELATÓRIO</th>

                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($this->admin_model->get_campanhas_by_produto($produto) as $c) { ?>
                      <tr>
                        <td style="text-transform: uppercase;"><small><?= $c->nome ?></small></td>
                        <td style="text-transform: uppercase;"> <small><?=$this->admin_model->get_tipo( $c->tipo ) ['nome']?></small></td>
                        <td style="text-transform: uppercase;">  <small><a href="<?= base_url() ?>sales/campanhas_links/<?= $c->id ?>">VER LINKS</a></small></td>
                        <td style="text-transform: uppercase;"> <small><a href="<?= base_url() ?>sales/campanhas_prospection/<?= $c->id ?>">PROSPECÇOES</a></small></td>
                        <td style="text-transform: uppercase;"> <small><a href="<?= base_url() ?>sales/campanhas_sales/<?= $c->id ?>">VENDAS</a></small></td>

                        <td style="text-transform: uppercase;"> <small><a href="<?= base_url() ?>sales/campanhas_reports/<?= $c->id ?>">RELATÓRIOS</a></small></td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a  class="dropdown-item" href="<?= base_url() ?>sales/campanhas_editar/<?= $c->id ?>"
                                ><i class="bx bx-edit-alt me-1"></i> Editar</a
                              >
                              <a onclick="delete_campanha(<?= $c->id ?>)" class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

           
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

      function get_categoria(categoria_id) 
    {

      $.ajax({
                          method: 'POST',
                          url: '<?= base_url() ?>persona/act_get_categoria',
                          data: {categoria_id:categoria_id},
                          success: function(data) {
                              var resp = JSON.parse(data)

                                  $('#update_categoria_id').val(resp.id)
                                  $('#update_categoria_nome').val(resp.nome)
                                  $('#update_categoria_slug').val(resp.slug)
                                  $('#update_categoria_descricao').val(resp.descricao)

                          },
                          error: function(data) {
                              alert('Ocorreu um erro temporário.');
                          },
                      });

    }

        function delete_campanha(id) {

          var resposta = confirm("Você deseja excluir?");
          if (resposta === true) {
              // O usuário pressionou "OK"

              
              $.ajax({
                          method: 'POST',
                          url: '<?= base_url() ?>sales/act_delete_campanha',
                          data: {id:id},
                          success: function(data) {
                              var resp = JSON.parse(data)

                              if (resp.status == "true") {

                                  alert('Excluido com sucesso!')
                                  location.reload()

                              } else {
                                  alert('Erro ao exluir!')
                              }
                          },
                          error: function(data) {
                              alert('Ocorreu um erro temporário.');
                          },
                      });
                    
          } 
        }

    </script>

  </body>
</html>