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

    <title>Leads</title>

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
                <a href="<?= base_url() ?>sales/listas_tags/<?= $lista['tag'] ?>">
                <button class="btn btn-light text-primary border border-0"> <span class="bx bx-left-arrow-alt"></span>VOLTAR</button>
                </a>
              </div>
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?= $lista['nome'] ?></h4>
           

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
                               
              <div class="d-flex  align-items-center justify-content-between">
                <div>
                  <h5>LEADS</h5>
                  <p>Lista de leads segmentados para esta lista.</p>
                  <p>Importação: <?php if ($lista['importacao'] == 1) {
                                    echo "Automático - Tag";
                                  } else if ($lista['importacao'] == 2) {
                                    echo "Manual - Prospecção";
                                  } ?></p>
                </div>
                <button id="exportBtn" class="btn btn-primary text-uppercase mb-3"><small>Exportar para Excel</small></button>
                <!-- <button data-bs-toggle="modal" data-bs-target="#modalAddProbe"  class="btn btn-success text-uppercase mb-3"><small>+ Sincronizar - Probe</small></button> -->

                <button data-bs-toggle="modal" data-bs-target="#modalAddBrevo"  class="btn btn-success text-uppercase mb-3"><small>+ Sincronizar - Brevo</small></button>
              </div>

              <?php// if ($lista['importacao'] == 1) { ?>
                  <?php// $total =  (count($this->admin_model->get_leads_by_tags($lista['tag'])) -  count($this->admin_model->getLeadsToSynchronize($lista['id'], $lista['tag'], 100000000))); ?>
              <?php //} else if ($lista['importacao'] == 2) { ?>
                <?php //$total =  (count($this->admin_model->get_leads_by_campanha_associada($lista['campanha_associada'])) -  count($this->admin_model->getLeadsToSynchronizeCampanhaAssociada($lista['id'], $lista['campanha_associada'], 100000000))); ?>
              <?php //} ?>


              <!-- <?php //if ($lista['importacao'] == 1) { ?>
                  <div>
                    <p><?php// echo "<small>SINCRONIZADOS: </small>(" . $total . " / " . count($this->admin_model->get_leads_by_tags($lista['tag'])) . ") - ";
                       // echo round((($total / count($this->admin_model->get_leads_by_tags($lista['tag']))) * 100), 2) . "%" ?></p>
                  </div>
                <?php //} else if ($lista['importacao'] == 2) { ?>
                  <div>
                    <p><?php// echo "<small>SINCRONIZADOS: </small>(" . $total . " / " . count($this->admin_model->get_leads_by_campanha_associada($lista['campanha_associada'])) . ") - ";
                     //   echo round((($total / count($this->admin_model->get_leads_by_campanha_associada($lista['campanha_associada']))) * 100), 2) . "%" ?></p>
                  </div>
                <?php //} ?> -->

                    </div>
                    <div class="card-body">



                    <table id="" class="display " style="width:100%">
                        <thead>
                            <tr>
                                <th><small>NOME</small></th>
                                <th><small>EMAIL</small></th>
                                <th><small>TELEFONE</small></th>
                                <th></th>


                            </tr>
                        </thead>
                        <tbody>


                        <?php if ($lista['importacao'] == 1) { ?>

                          <?php foreach ($leads as $l) { ?>
                              <tr>

                                  <td><a href="<?= base_url() ?>persona/editar/<?= $l->person_id ?>" target='_blank'><?= $this->admin_model->get_person($l->person_id)['nome']; ?></a></td>
                                  <td></td>
                                  <td > </td>
                                    <td> <button class="btn btn-danger text-white font-weight-bolder " onclick="deleteClassificacao(<?= $l->person_id ?>, <?= $lista['tag'] ?>)" ><small>X</small></button></td>

                              </tr>
                          <?php } ?>

                        <?php } else if ($lista['importacao'] == 2) { ?>

                          <?php foreach ($this->admin_model->get_leads_by_campanha_associada($lista['campanha_associada']) as $l) { ?>
                              <tr>
                              <td><a href="<?= base_url() ?>persona/editar/<?= $l->lead_id ?>" target='_blank'><?= $this->admin_model->get_person($l->lead_id)['nome']; ?></a></td>
                                  <td><?php if ($this->admin_model->get_emails_validated($l->lead_id)) {
                                        echo $this->admin_model->get_emails_validated($l->lead_id)['email'];
                                      } else {
                                        echo "-";
                                      }; ?></td>
                                  <td><?php if ($this->admin_model->get_telefones_validated($l->lead_id)) {
                                        echo $this->admin_model->get_telefones_validated($l->lead_id)['telefone'];
                                      } else {
                                        echo "-";
                                      } ?></td>

                              </tr>
                          <?php } ?>

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

             <!-- Paginacao -->
          
             <div class="d-flex justify-content-center">
                    <nav aria-label="..." class="mt-5 mb-5">
                        <ul class="pagination">

                            <?php
                                          $pagina = intval($this->input->get('p'));

                                          $anterior = ($pagina - 1);
                                          if ($anterior <= 0 || $anterior == "") {
                                            $anterior = null;
                                            $pagina = 1;
                                          }
                                          $atual =  $pagina;
                                          $proxima = ($pagina + 1);

                            ?>

                            <?php if ($atual > 3) {  ?>
                                <li class="page-item"><a class="page-link" href="<?= base_url() ?>sales/lista_leads/<?=$lista['id']?>">Inicio</a></li>
                            <?php } ?>
                            <?php if ($atual > 1) {  ?>
                                <li class="page-item"><a class="page-link" href="<?= base_url() ?>sales/lista_leads/<?=$lista['id']?>?p=<?= $anterior ?>">Anterior</a></li>
                            <?php } ?>

                            <?php if ($atual > 1) {  ?>
                                <li class="page-item"><a class="page-link" href="<?= base_url() ?>sales/lista_leads/<?=$lista['id']?>?p=<?= $anterior ?>"><?= $anterior ?></a></li>
                            <?php } ?>


                            <li class="page-item active bg-blue">
                                <a class="page-link" href="<?= base_url() ?>sales/lista_leads/<?=$lista['id']?>?p=<?= $atual ?> "><?= $atual ?> <span class="sr-only"></span></a>
                            </li>

                            <?php if ($atual < $total_pages) {  ?>

                                <li class="page-item"><a class="page-link" href="<?= base_url() ?>sales/lista_leads/<?=$lista['id']?>?p=<?= $proxima ?>"><?= $proxima ?></a></li>

                            <?php } ?>

                            <?php if ($atual < $total_pages) {  ?>
                                <?php if ($atual >= 1) {  ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?= base_url() ?>sales/lista_leads/<?=$lista['id']?>?p=<?= $proxima ?>">Próximo</a>
                                    </li>
                                <?php } ?>
                            <?php } ?>

                            <li class="page-item"><a class="page-link" href="<?= base_url() ?>sales/lista_leads/<?=$lista['id']?>?p=<?= $total_pages ?>">Última</a></li>


                        </ul>
                    </nav>
                </div>
            

       
                                      <!-- Paginacao -->



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


                        <div class="modal fade" id="modalAddBrevo" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Nova Sincronizaçao - Brevo</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">

                              <form id="form-add-sincronizacao" >
                          
                                  <div class="row">
                                    <div class="col mb-3">
                                    <input type="hidden" required name="lista_id" value="<?= $lista['id'] ?>" class="form-control"  />
                                    <input type="hidden" required name="importacao" value="<?= $lista['importacao'] ?>" class="form-control"  />
                                    <input type="hidden" required name="campanha_associada" value="<?= $lista['campanha_associada'] ?>" class="form-control"  />

                                    <labelfor="nameBasic" class="form-label">Quantidade Máxima</label>
                                    <input type="number" class="form-control" required  name="quantidade_max">
                        
                                    
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


                        <div class="modal fade" id="modalAddProbe" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Nova Sincronizaçao - Probe</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">

                              <form id="form-add-sincronizacao-probe" >
                          
                                  <div class="row">
                                    <div class="col mb-3">
                                    <input type="hidden" required name="lista_id" value="<?= $lista['id'] ?>" class="form-control"  />


                                    <labelfor="nameBasic" class="form-label">Quantidade Máxima</label>
                                    <input type="number" class="form-control" required  name="quantidade_max">
                        
                                    
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

<!-- FileSaver.js (for saving files in the browser) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

<!-- SheetJS (XLSX) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>

<script>

   function deleteClassificacao(person_id, tag_id) {

       $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>sales/act_delete_classificacao_special',
            data: {person_id:person_id, tag_id:tag_id},
            success: function(data) {
                var resp = JSON.parse(data)

                if (resp.status == "true") {
                    // alert(resp.message)
                    location.reload()
                } else {
                  alert(resp.message)
                }
            },
            error: function(data) {
                alert('Ocorreu um erro temporário.');
            },
        });
  }

</script>


<?php
// ... Fetch data from your database and store it in $leads ...

// Encode the PHP array to JSON format
$c = [];

foreach ($this->admin_model->get_leads_by_tags($lista['tag']) as $l) {

  array_push($c, array(
    "NOME" => $this->admin_model->get_person($l->person_id)['nome'],
    "E-MAIL" => $this->admin_model->get_emails_validated($l->person_id)['email'],
    "TELEFONE" => $this->admin_model->get_telefones_validated($l->person_id)['telefone']

  ));
}

$leads_json = json_encode($c);
?>

<!-- Your HTML/JS code -->

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
        saveAs(blob, "leads-<?= str_replace(" ", "-", $lista['nome']) ?>.xlsx");
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

     

      $('#form-add-sincronizacao-probe').on('submit', function(e) {

          e.preventDefault()

          var form = $(this).serialize()

          $.ajax({
              method: 'POST',
              url: '<?= base_url() ?>sales/act_add_sincronizacao_probe',
              data: form,
              success: function(data) {
                  var resp = JSON.parse(data)

                  if (resp.status == "true") {

                      alert(resp.message)
                      location.reload()

                  } else {
                    alert(resp.message)
                  }
              },
              error: function(data) {
                  alert('Ocorreu um erro temporário.');
              },
          });
      })


      $('#form-add-sincronizacao').on('submit', function(e) {

            e.preventDefault()

            
            var form = $(this).serialize()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>sales/act_add_sincronizacao',
                data: form,
                success: function(data) {
                    var resp = JSON.parse(data)

                    if (resp.status == "true") {

                        alert(resp.message)
                        location.reload()

                    } else {
                      alert(resp.message)
                    }
                },
                error: function(data) {
                    alert('Ocorreu um erro temporário.');
                },
          });
    })

    $('#form-update-campanha').on('submit', function(e) {
            e.preventDefault()

            var form = $(this).serialize()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>sales/act_update_lista',
                data: form,
                success: function(data) {
                    var resp = JSON.parse(data)

                    if (resp.status == "true") {

                        alert('Adicionado com sucesso!')
                        window.location.href = "<?= base_url() ?>sales/listas"

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
   let table = new DataTable('#myTable');
</script>
  </body>
</html>