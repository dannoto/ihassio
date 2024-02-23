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

    <title>Lista de Pessoas</title>

    <meta name="description" content="" />

    <?php $this->load->view('comp/header'); ?>



    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.9/css/buttons.dataTables.min.css">



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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Persona /</span> Lista</h4>

              <!-- Basic Bootstrap Table -->
              <a href="<?= base_url() ?>persona/adicionar">
                  <button class="btn btn-primary mt-2 mb-3"  type="button" >+ ADICIONAR</button>
              </a>

              <div class="row mt-3 mb-3">
                
              <div class="col-md-6" >
                  <a href="<?=base_url()?>persona/lista?filter=pessoa_fisica">
                  <div class=" text-center d-flex  border border-2 rounded-1 align-items-center justify-content-center border-primary ">
                    
                    <p class="mt-3 text-primary semibold">PESSOA FÍSICA</p>
                    
                  </div>

                  </a>
                  

                </div>
                <div class="col-md-6" >
                    <a href="<?=base_url()?>persona/lista?filter=pessoa_juridica">
                    <div class=" text-center d-flex  border border-2 rounded-1 align-items-center justify-content-center border-primary ">
                      
                      <p class="mt-3 text-primary semibold">PESSOA JURÍDICA</p>
                      
                    </div>
                    </a>
                 

                </div>
              
              
               
              </div>

              <div style="<?php if ($this->input->get('filter') == "pessoa_fisica") { echo "display:block"; } else { echo "display:none"; }?>" >
                    <table id="tablePessoaFisica" class="display " style="width:100%">
                        <thead>
                            <tr>
                              <th class="text-uppercase">Nome</th>
                              <th class="text-uppercase">sexo</th>
                              <th class="text-uppercase">email</th>
                              <th class="text-uppercase">telefone</th>
                              <th class="text-uppercase">perfil</th>
                              <th></th>

                            </tr>
                        </thead>
                        <tbody>

                           <?php foreach ($this->admin_model->get_persons("pessoa_fisica") as $c) { ?>

                            <tr>
                            <td style="text-transform: uppercase;"><small><?= $c->nome ?></small></td>
                            <td style="text-transform: uppercase;"> <small><?= $c->sexo ?></small></td>
                                <td> <?php

                                      if ($c->validacao_email == "0") {
                                        echo '<span class="badge bg-label-warning me-1"><small>PENDENTE</small></span>';
                                      } else if ($c->validacao_email == "1") {
                                        echo '<span class="badge bg-label-success me-1"><small>VERIFICADO</small></span>';
                                      } else if ($c->validacao_email == "2") {
                                        echo '<span class="badge bg-label-danger me-1"><small>IMPRECISO</small></span>';
                                      }
                                      ?></td>
                                <td><?php

                                    if ($c->validacao_telefone == "0") {
                                      echo '<span class="badge bg-label-warning me-1"><small>PENDENTE</small></span>';
                                    } else if ($c->validacao_telefone == "1") {
                                      echo '<span class="badge bg-label-success me-1"><small>VERIFICADO</small></span>';
                                    } else if ($c->validacao_telefone == "2") {
                                      echo '<span class="badge bg-label-danger me-1"><small>IMPRECISO</small></span>';
                                    }
                                    ?></td>
                                <td>   <?php

                                        if ($c->validacao_perfil == "0") {
                                          echo '<span class="badge bg-label-warning me-1"><small>PENDENTE</small></span>';
                                        } else if ($c->validacao_perfil == "1") {
                                          echo '<span class="badge bg-label-success me-1"><small>VERIFICADO</small></span>';
                                        } else if ($c->validacao_perfil == "2") {
                                          echo '<span class="badge bg-label-danger me-1"><small>IMPRECISO</small></span>';
                                        }
                                        ?></td>
                            
                                <td>   <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a  class="dropdown-item" href="<?= base_url() ?>persona/editar/<?= $c->id ?>"
                                  ><i class="bx bx-edit-alt me-1"></i> Editar</a
                                >
                                <a onclick="delete_persona(<?= $c->id ?>)" class="dropdown-item" href="javascript:void(0);"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div></td>

                            </tr>
                        <?php } ?>

                          
                           
                        </tbody>
                      
                    </table>
              </div>
              <div style="<?php if ($this->input->get('filter') == "pessoa_juridica") { echo "display:block"; } else { echo "display:none"; }?>" >
                    <table id="tablePessoaJuridica" class="display " style="width:100%">
                        <thead>
                            <tr>
                              <th class="text-uppercase">Nome</th>
                              <th class="text-uppercase">CNPJ</th>
                              <th class="text-uppercase">Data</th>

                              <th class="text-uppercase">email</th>
                              <th class="text-uppercase">telefone</th>
                              <th></th>

                            </tr>
                        </thead>
                        <tbody>

                           <?php foreach ($this->admin_model->get_persons("pessoa_juridica") as $c) { ?>

                            <tr>
                            <td style="text-transform: uppercase;"><small><?=substr( $c->nome,0 ,30); ?>...</small></td>
                            <td style="text-transform: uppercase;"> <small><?= $c->cnpj ?></small></td>
                            <td style="text-transform: uppercase;"> <small><?= $c->data ?></small></td>

                            <td> 
                                <?php

                                      if ($c->validacao_email == "0") {
                                        echo '<span class="badge bg-label-warning me-1"><small>PENDENTE</small></span>';
                                      } else if ($c->validacao_email == "1") {
                                        echo '<span class="badge bg-label-success me-1"><small>VERIFICADO</small></span>';
                                      } else if ($c->validacao_email == "2") {
                                        echo '<span class="badge bg-label-danger me-1"><small>IMPRECISO</small></span>';
                                      }
                                ?>
                            </td>
                            <td>
                                <?php

                                    if ($c->validacao_telefone == "0") {
                                      echo '<span class="badge bg-label-warning me-1"><small>PENDENTE</small></span>';
                                    } else if ($c->validacao_telefone == "1") {
                                      echo '<span class="badge bg-label-success me-1"><small>VERIFICADO</small></span>';
                                    } else if ($c->validacao_telefone == "2") {
                                      echo '<span class="badge bg-label-danger me-1"><small>IMPRECISO</small></span>';
                                    }
                                ?>
                            </td>

                            <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a  class="dropdown-item" href="<?= base_url() ?>persona/editar/<?= $c->id ?>"
                                  ><i class="bx bx-edit-alt me-1"></i> Editar</a
                                >
                                <a onclick="delete_persona(<?= $c->id ?>)" class="dropdown-item" href="javascript:void(0);"
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

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.9/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.9/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
      let tableFisica = new DataTable('#tablePessoaFisica');


      let tableJuridica = new DataTable('#tablePessoaJuridica');

    </script>
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

        function delete_persona(id) {

          var resposta = confirm("Você deseja excluir?");
          if (resposta === true) {
              // O usuário pressionou "OK"

              
              $.ajax({
                          method: 'POST',
                          url: '<?= base_url() ?>persona/act_delete_pessoa',
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

        $('#form-add-categoria').on('submit', function(e) {
            e.preventDefault()

            var form = $(this).serialize()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>persona/act_add_categoria',
                data: form,
                success: function(data) {
                    var resp = JSON.parse(data)

                    if (resp.status == "true") {

                        alert('Adicionado com sucesso!')
                        location.reload()

                    } else {
                        alert('Erro ao adicionar!')
                    }
                },
                error: function(data) {
                    alert('Ocorreu um erro temporário.');
                },
            });
        })


        $('#form-update-categoria').on('submit', function(e) {
            e.preventDefault()

            var form = $(this).serialize()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>persona/act_update_categoria',
                data: form,
                success: function(data) {
                    var resp = JSON.parse(data)

                    if (resp.status == "true") {

                        alert('Atualizado com sucesso!')
                        location.reload()

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