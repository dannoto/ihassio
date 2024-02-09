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

    <title>Editar Campanha</title>

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
            <div class="mb-3 mt-1">
                <a href="<?= base_url() ?>sales/campanhas_produtos/<?=$campanha['id']?>">
                <button class="btn btn-light text-primary border border-0"> <span class="bx bx-left-arrow-alt"></span> VOLTAR    </button>
                </a>
              </div>
              <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light"></span> <?= $campanha['nome'] ?></h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">

                <!-- Basic Layout -->
                <div class="col-xxl">

                
                  <div class="card mb-4">
                    
                    <div class="card-header d-flex align-items-center justify-content-between">

           
                    </div>
                    <div class="card-body">

                      <div class="d-flex  align-items-center justify-content-between">
                              <div >
                                  <h5> VENDAS REALIZADAS</h5>
                                  <p>Todas as vendas realizadas nesta campanha</p>
                              </div>
                              <button id="exportBtn" class="btn btn-primary text-uppercase mb-3"><small>Exportar para Excel</small></button>

                              <button class="btn btn-primary text-uppercase mb-3"  data-bs-toggle="modal" data-bs-target="#modalAdicionarEvento"  onclick=""><small>+ ADICIONAR VENDA</small></button>
                      </div>


                    <table id="myTable" class="display " style="width:100%">
                        <thead>
                            <tr>
                                <th>COMPRADOR</th>
                                <th>E-MAIL</th>
                                <th>TELEFONE</th>
                                <th>TIPO</th>
                                <th>VALOR</th>
                                <th>PROVEDOR</th>
                                <th>DATA</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($this->admin_model->get_vendas_by_campanha($campanha['id']) as $c) { ?>

                            <tr>
                                <td><?= $this->admin_model->get_person($c->lead_id)['nome']; ?></td>
                                <td><?php if ($this->admin_model->get_emails_validated($c->lead_id)) {
                                      echo $this->admin_model->get_emails_validated($c->lead_id)['email'];
                                    } else {
                                      echo "-";
                                    } ?></td>
                                <td><?php if ($this->admin_model->get_telefones_validated($c->lead_id)) {
                                      echo $this->admin_model->get_telefones_validated($c->lead_id)['telefone'];
                                    } else {
                                      echo "-";
                                    } ?></small></td>
  <td> <?= $c->tipo ?></td>
                                <td>R$ <?= $c->valor ?></td>
                                <td><small class="text-uppercase"><?= $c->provedor ?></small></td>
                                <td><small class="text-uppercase"><?= $this->admin_model->convertDate($c->data); ?></small></td>
                                <td>
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                               
                                    <a onclick="delete_vendas(<?= $c->id ?>)" class="dropdown-item" href="javascript:void(0);"
                                      ><i class="bx bx-trash me-1"></i> Delete</a>
                                  </div>
                                </div>
                                </td>

                            </tr>
                          <?php } ?>

                          
                        
                           
                        </tbody>
                       
                    </table>
                  
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

    <div class="modal fade" id="modalAdicionarEvento" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">ADICIONAR VENDA</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">

                              <form id="form_add_venda" >
                          
                                  <div class="row">
                                    <div class="col mb-3">

                                    <input type="hidden" required name="campanha_id" value="<?= $campanha['id'] ?>" class="form-control"  />
                                    <input type="hidden" required name="produto_id" value="<?= $campanha['produto'] ?>" class="form-control"  />


                                    <label for="nameBasic" class="form-label">COMPRADOR</label>
                                    <input  name="nome" id="comprador-busca" placeholder="Busque por e-mail ou telefone" class="form-control"  ><br>


                                    <div style="max-height: 120px;height: 120px;overflow-y:scroll" id="comprador_div">
                                      <ul style="list-style: none;">
                                      <input style="width:22px;height:22px" name="lead_id[]" value="0" type="radio">
                                      <small>[DESCONHECIDO]</small>
                                     
                                        <?php foreach ($this->admin_model->searchLeads("") as $c) { ?>
                                          <li style="padding-top: 5px;"> 
                                            <input style="width:22px;height:22px" name="lead_id[]" value="<?= $c ?>" type="radio">
                                            <small>[<?php if ($this->admin_model->get_emails_validated($c)) {
                                                      echo $this->admin_model->get_emails_validated($c)['email'];
                                                    } else {
                                                      echo "-";
                                                    } ?>] - [<?php if ($this->admin_model->get_telefones_validated($c)) {
                                                                                                                                                                                                                    echo $this->admin_model->get_telefones_validated($c)['telefone'];
                                                                                                                                                                                                                  } else {
                                                                                                                                                                                                                    echo "-";
                                                                                                                                                                                                                  } ?>]</small>
                                          </li>
                                        <?php } ?>
                                   
                                      </ul>
                                    </div>
                                   <br>

                                    <label for="nameBasic" class="form-label">VALOR</label>
                                    <input required name="valor"  type="number" min="0.00" max="10000.00" step="0.01" class="form-control"  ><br>

                                  
                                 
                                    <label for="nameBasic" class="form-label">PROVEDOR</label>

                                    <select required  name="provedor" class="form-select"  >
                                      <option  value="">Selecionar</option>
                                      <option  value="hotmart">Hotmart</option>
                                      <option  value="kiwify">kiwify</option>
                                      <option  value="monetizze">Monetizze</option>
                                      <option  value="edduz">Edduz</option>
                                      <option  value="braip">Braip</option>
                                      <option  value="mercado_pago">Mercado Pago</option>
                                      <option  value="stripe">Stripe</option>
                                      <option  value="pix">PIX</option>
                                      <option  value="outros">Outros</option>

                                     </select><br>

                                     <label for="nameBasic" class="form-label">TIPO</label>
                                    <select required id="type" name="tipo" class="form-select"  >
                                        <option  value="">Selecionar</option>
                                        <option  value="email">Email</option>
                                        <option  value="whatsapp">Whatsapp</option>
                                        <option  value="twitter">Twitter</option>
                                        <option  value="tiktok">Tiktok</option>
                                        <option  value="facebook">Facebook</option>
                                        <option  value="youtube">Youtube</option>
                                        <option  value="telegram">Telegram</option>

                                     </select><br>



                                     <label for="nameBasic" class="form-label">ID DA VENDA</label>
                                    <input required name="provedor_venda_id" class="form-control"  ><br>

                                    <label required for="nameBasic" class="form-label">DATA </label>
                                    <input type="datetime-local" name="data" class="form-control">

                                    </div>
                                  </div>

                             
                               
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Fechar
                                  </button>
                                  <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- Modal -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>

    <?php $this->load->view('comp/footer'); ?>



<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.9/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.9/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>

<script>
   let table = new DataTable('#myTable');
</script>
<script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

    <?php

    $c = [];

    foreach ($this->admin_model->get_vendas_by_campanha($campanha['id']) as $l) {



      array_push($c, array(
        "COMPRADOR" => $this->admin_model->get_person($l->lead_id)['nome'],
        "E-MAIL" => $this->admin_model->get_emails_validated($l->lead_id)['email'],
        "TELEFONE" => $this->admin_model->get_telefones_validated($l->lead_id)['telefone'],
        "VALOR" => $l->valor,
        "PROVEDOR" => $l->provedor,

        "VENDA ID" => $l->provedor_venda_id,
        "DATA" => $this->admin_model->convertDate($l->data),

      ));
    }

    $leads_json = json_encode($c);

    ?>


<script>

  $(document).ready(function() {
      var table = $('#myTable').DataTable();
      
      // Retrieve the JSON-encoded PHP array
      var leadsData = <?php echo $leads_json; ?>;
      
      // Export to Excel function
      $('#exportBtn').on('click', function() {
          // Create a Workbook and a Worksheet
          var workbook = XLSX.utils.book_new();
          var worksheet = XLSX.utils.json_to_sheet(leadsData);

          // Add the worksheet to the workbook
          XLSX.utils.book_append_sheet(workbook, worksheet, "Dados");

          // Convert the workbook to Excel binary data
          var excelData = XLSX.write(workbook, { type: "binary" });

          // Create a Blob and download the file
          var blob = new Blob([s2ab(excelData)], {
              type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
          });
          saveAs(blob, "vendas-<?= str_replace(" ", "-", $campanha['nome']) ?>.xlsx");
      });

      // s2ab function (converts string to ArrayBuffer)
      function s2ab(s) {
          var buf = new ArrayBuffer(s.length);
          var view = new Uint8Array(buf);
          for (var i = 0; i < s.length; i++) {
              view[i] = s.charCodeAt(i) & 0xFF;
          }
          return buf;
      }
  });

</script>
<script>



        $('#form_add_venda').on('submit', function(e) {
            e.preventDefault()

            var form = $(this).serialize()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>sales/act_add_venda',
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
</script>
<script>
  
  function delete_vendas(id) {

     var resposta = confirm("Você deseja excluir?");

     if (resposta === true) {
         // O usuário pressionou "OK"

         
         $.ajax({
                     method: 'POST',
                     url: '<?= base_url() ?>sales/act_delete_vendas',
                     data: {id:id},
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
<script>

  $('#comprador-busca').on('keyup', function(e) {

          var query = $(this).val()

                    $.ajax({
                      method: 'POST',
                      url: '<?= base_url() ?>sales/act_seach_leads',
                      data: {query:query},
                      success: function(data) {

                            $('#comprador_div').html("")
                            $('#comprador_div').html(data)
                      },
                      error: function(data) {
                          alert('Ocorreu um erro temporário.');
                      },
                    });
               
          

  })

</script>


  </body>
</html>