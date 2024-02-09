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

    <title>Lista de Tarefas</title>

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
              <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"></span> Tarefas</h4>

              <!-- Basic Bootstrap Table -->
              <a href="<?= base_url() ?>persona/tarefas_adicionar">
                  <button class="btn btn-primary mt-1 mb-3"  type="button" >+ ADICIONAR</button>
              </a>
              <br>
              <div class="card p-2 mb-3 pl-3 pt-3 pb-3" style="padding-left: 15px !important;">
                <H4>Filtro</H4>
                
                <form method="GET" >
                    <div class="row">
                          <div class="col-md-4">
                            <p class="mt-1" >Status</p>
                            <select  name="tarefa_status" class="form-select"  >
                              <option  value="">Selecionar</option>
                              <option <?php if ($this->input->get('tarefa_status') == '1') {
                                        echo "selected";
                                      } ?> value="1">ATIVO</option>
                              <option <?php if ($this->input->get('tarefa_status') == '2') {
                                        echo "selected";
                                      } ?> value="2">PROCESSANDO</option>
                              <option <?php if ($this->input->get('tarefa_status') == '3') {
                                        echo "selected";
                                      } ?> value="3">FINALIZADO</option>
                              <option <?php if ($this->input->get('tarefa_status') == '4') {
                                        echo "selected";
                                      } ?> value="4">INATIVO</option>
                              <option <?php if ($this->input->get('tarefa_status') == '5') {
                                        echo "selected";
                                      } ?> value="5">CONCLUÍDO</option>
                            </select>
                          </div>
                          <div class="col-md-4">
                            <p class="mt-1" >Tag</p>
                            <select  name="tarefa_tag" class="form-select"  >
                              <option value="">Selecionar</option>
                                <?php foreach ($this->admin_model->get_itens() as $c) { ?>            
                                  <option <?php if ($this->input->get('tarefa_tag') == $c->id) {
                                            echo "selected";
                                          } ?> value="<?= $c->id ?>"><?= $c->nome ?> - <?= $this->admin_model->get_categoria($c->categoria_id)['nome'] ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-4">
                            <p></p>
                            <button class="btn btn-primary" style="margin-top: 25px;" type="submit">Buscar</button>
                          </div>
                    </div>
                </form>
              </div>

              <div class="card">
              <?php if (count($tarefas) > 0) { ?>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="p-3" >NOME</th>
                        <th class="p-3" >TAG</th>
                        <th class="p-3" >LEADS </th>
                        <th class="p-3" >QTD</th>
                        <th class="p-3" >FONTE</th>

                        <th class="p-3" >STATUS</th>
                        <th class="p-3" ></th>


                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">


                
                        <?php foreach ($tarefas as $c) { ?>

                             <tr>
                              <td style="text-transform: uppercase;" ><small>[#<?= $c->id ?>] <?= $c->tarefa_nome ?></small></td>
                              <td style="text-transform: uppercase;" ><span class=" text-black  badge bg-label-success"><?= $this->admin_model->get_item($c->tarefa_tag)['nome'] ?></span></td>
                              <td style="text-transform: uppercase;" ><small><a href="<?= base_url() ?>persona/tarefas_leads/<?= $c->id ?>">VER</a></small></td>

                              <td style="text-transform: uppercase;"><small>(<?= count($this->admin_model->getInstagramLeadsByTaskValid($c->id)) ?> / <?= count($this->admin_model->getInstagramLeadsByTask($c->id)) ?>) - <?php
                                                                                                                                                                                                                            if (count($this->admin_model->getInstagramLeadsByTask($c->id))  != 0) {
                                                                                                                                                                                                                              echo round((count($this->admin_model->getInstagramLeadsByTaskValid($c->id)) / count($this->admin_model->getInstagramLeadsByTask($c->id))) * 100, 2);
                                                                                                                                                                                                                            } ?>%</small></td>

                              <td style="text-transform: uppercase;"><small><a target="_blank" href="<?= $c->tarefa_url ?>">ACESSAR</a></small></td>

                              <td style="text-transform: uppercase;" ><span class=" text-black badge bg-label-success"><?php

                                                                                                                        if ($c->tarefa_status == 1) {
                                                                                                                          echo "ATIVO";
                                                                                                                        } else if ($c->tarefa_status == 2) {
                                                                                                                          echo "PROCESSANDO";
                                                                                                                        } else if ($c->tarefa_status == 3) {
                                                                                                                          echo "FINALIZADO";
                                                                                                                        } else if ($c->tarefa_status == 4) {
                                                                                                                          echo "INATIVO";
                                                                                                                        } else if ($c->tarefa_status == 5) {
                                                                                                                          echo "CONCLUIDO";
                                                                                                                        }
                                                                                                                        ?></span></td>
                              <td>
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a  class="dropdown-item" href="<?= base_url() ?>persona/tarefas_editar/<?= $c->id ?>"
                                      ><i class="bx bx-edit-alt me-1"></i> Editar</a
                                    >
                                    <a onclick="delete_tarefa(<?= $c->id ?>)" class="dropdown-item" href="javascript:void(0);"
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
                <?php } else { ?>

<div class="mt-5 mb-5">
  <p class="text-center text-uppercase">Nenhum resultado encontrado.</p>
</div>

<?php } ?>
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

    

        function delete_tarefa(id) {

          var resposta = confirm("Você deseja excluir?");
          if (resposta === true) {
              // O usuário pressionou "OK"

              
              $.ajax({
                          method: 'POST',
                          url: '<?= base_url() ?>persona/act_delete_tarefa',
                          data: {tarefa_id:id},
                          success: function(data) {
                              var resp = JSON.parse(data)

                              if (resp.status == "true") {

                                  alert('Excluido com sucesso!')
                                  location.reload()

                              } else {
                                  alert('Erro ao excluir!')
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