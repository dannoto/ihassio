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
                <a href="<?= base_url() ?>persona/tarefas">
                <button class="btn btn-light text-primary border border-0"> <span class="bx bx-left-arrow-alt"></span> VOLTAR    </button>
                </a>
              </div>
              <h4 class="fw-bold py-3 m\b-4"><span class="text-muted fw-light"><?= $t['tarefa_nome'] ?></h4>
           

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
                  <p><?= $t['tarefa_nome'] ?></p>
                </div>
                <button id="exportBtn" class="btn btn-primary text-uppercase mb-3"><small>Exportar para Excel</small></button>
              </div>
     
       
                    </div>
                    <div class="card-body">



                    <table  style="width:100%">
                        <thead>
                            <tr>
                            <th><small></small></th>

                                <th><small>NOME</small></th>
                                <th><small>LINKS</small></th>
                                <th><small>MENÇOES</small></th>

                                <th><small>EMAIL</small></th>
                                <th><small>TELEFONE</small></th>
                                <th><small>INFO</small></th>
                                <th><small></small></th>

                                <th><small></small></th>
                                <th><small></small></th>


                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($this->admin_model->getInstagramLeadsByTask($t['id']) as $l) { ?>

                        
                            
                            <tr class="mt-5 mb-5" style="margin-bottom:20px">
                            <td><?= $l->id; ?></td>

                                <td><a target="_blank" href="https://instagram.com/<?= $l->username ?>"><?= $l->full_name; ?></a></td>

                                <td><?php if (strlen($l->links) > 0) {
                                      echo "SIM";
                                    } else {
                                      echo "NÃO";
                                    } ?></td>

                                <td><?php if (strlen($l->mencoes) > 0) {
                                      echo "SIM";
                                    } else {
                                      echo "NÃO";
                                    } ?></td>

                           

                                <td><?= $l->email; ?></td>
                                <td><?= $l->telefone; ?></td>
                                <td > <button onclick="getInstaLeadDemanda(<?= $l->tarefa_id ?>, <?= $l->tag_id ?>, '<?= $l->username ?>')"  data-bs-toggle="modal" data-bs-target="#modalInfo"  class="btn btn-danger" ><small>VER</small></button> </td>
                                  <?php if ($l->convertido == 0) { ?>
                                    <td > <button onclick="convertInapto(<?= $l->id ?>)"   class="btn btn-light" ><small>INAPTO</small></button> </td>
                                  <?php } else { ?>
                                    <td></td>
                                  <?php }  ?>

                                  <?php if ($l->convertido == 0) { ?>
                                      <td> <button onclick="getInstaLead(<?= $l->tarefa_id ?>, <?= $l->tag_id ?>, '<?= $l->username ?>')" data-bs-toggle="modal" data-bs-target="#modalEditar"  class="btn btn-warning"><small>EDITAR</small></button>  </td>
                                  <?php } else { ?>
                                      <td></td>
                                  <?php }  ?>


                                <td> <?php if ($l->convertido == 0) { ?>
                                           <button onclick="convertInstaLeadToPerson(<?= $l->tarefa_id ?>, <?= $l->tag_id ?>, '<?= $l->username ?>' )"  class="btn btn-success"><small>CONVERTER</small></button>
                                    <?php } else { ?>
                                           <span  class=" text-black  badge bg-label-success" ><small>CONVERTIDO</small></span>
                                    <?php } ?> </td>

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


    <div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">INFORMAÇÕES </h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">

                              <form action="" id="form-update-lead">

                              <input class="form-control" name="id" id="update_lead_id" type="hidden">

                      
                              <div class="row">
                                    <div class="col-md-12">
                                        <small>NOME</small><br>
                                       <input class="form-control" name="full_name" id="update_lead_nome"  type="text">
                                    </div>
                              </div><br>

                              <div class="row">
                                    <div class="col-md-12">
                                        <small>E-MAIL</small><br>
                                       <input class="form-control" name="email" id="update_lead_email"  type="text">
                                    </div>
                              </div><br>

                              <div class="row">
                                    <div class="col-md-12">
                                        <small>TELEFONE</small><br>
                                       <input class="form-control" name="telefone" id="update_lead_telefone"  type="text">
                                    </div>
                              </div><br>


                              
                                </div>
                                <div class="modal-footer">
                               
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Fechar
                                  </button>

                                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                    Salvar
                                  </button>
                                    </form>

                                </div>
                              
                            </div>
                          </div>
                        </div>
                        <!-- Modal -->



    <div class="modal fade" id="modalInfo" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">INFORMAÇÕES </h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                            <div class="modal-body" id="conteudo-demanda">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Fechar
                                </button>
                            </div>
                              
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

<!-- FileSaver.js (for saving files in the browser) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

<!-- SheetJS (XLSX) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>



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
        saveAs(blob, "leads-<?= str_replace(" ", "-", $t['nome']) ?>.xlsx");
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

  function convertInapto(lead_id) {


    
    $.ajax({
        method: 'POST',
        url: '<?= base_url() ?>persona/act_convert_inapto',
        data: {
            lead_id:lead_id
        },
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

 function convertInstaLeadToPerson(tarefa_id, tag_id, username) {
    

    $.ajax({
        method: 'POST',
        url: '<?= base_url() ?>persona/act_convert_instalead_to_person',
        data: {
            tarefa_id:tarefa_id,
            tag_id: tag_id,
            username:username
        },
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


    function getInstaLeadDemanda(tarefa_id, tag_id, username) {
    

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>persona/act_get_insta_lead_demanda',
                data: {
                    tarefa_id:tarefa_id,
                    tag_id: tag_id,
                    username:username
                },
                success: function(data) {
                 
                 $('#conteudo-demanda').html(data)       
                },
                error: function(data) {
                    alert('Ocorreu um erro temporário.');
                },
            });

    }

    function getInstaLead(tarefa_id, tag_id, username) {


        $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>persona/act_get_insta_lead',
            data: {
                tarefa_id:tarefa_id,
                tag_id: tag_id,
                username:username
            },
            success: function(data) {
                var resp = JSON.parse(data)

                if (resp.status != "false") {

                lead_id = resp.id
                lead_nome = resp.full_name
                lead_telefone = resp.telefone
                lead_email = resp.email


                $('#update_lead_id').val(lead_id)
                $('#update_lead_nome').val(lead_nome)
                $('#update_lead_telefone').val(lead_telefone)
                $('#update_lead_email').val(lead_email)


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

    <script>

     


        

        $('#form-update-lead').on('submit', function(e) {
            e.preventDefault()

            var form = $(this).serialize()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>persona/act_update_insta_lead',
                data: form,
                success: function(data) {
                    var resp = JSON.parse(data)

                    if (resp.status == "true") {

                        // alert('Atualizado com sucesso!')
                        location.reload()

                    } else {
                        alert('Erro ao atualizado!')
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