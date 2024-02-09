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

          <?php

          function compactarIPv6($ipv6)
          {
            // Explode o endereço IPv6 em grupos de dígitos
            $grupos = explode(':', $ipv6);

            // Loop para remover os zeros à esquerda de cada grupo
            foreach ($grupos as &$grupo) {
              $grupo = ltrim($grupo, '0');
            }

            // Encontre a posição onde dois pontos duplos '::' podem ser inseridos
            $posicaoDuplos = array_search('', $grupos);

            // Se houver dois pontos duplos, remova os grupos consecutivos de zeros
            if ($posicaoDuplos !== false) {
              $zerosConsecutivos = array_fill(0, 8 - count($grupos), '0');
              array_splice($grupos, $posicaoDuplos, 1, $zerosConsecutivos);
            }

            // Junte os grupos de volta em um endereço IPv6 compactado
            $ipv6Compacto = implode(':', $grupos);

            return $ipv6Compacto;
          }

          ?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
 
            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="mb-3 mt-1">
                <a href="<?= base_url() ?>sales/campanhas_produtos/<?=$campanha['produto']?>">
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

                    
              <div>
                <h5>PROSPECÇOES</h5>
                <p>Relação de leads que visitaram a página de vendas dessa campanha.</p>
              </div>
              <button id="exportBtn" class="btn btn-primary text-uppercase mb-3"><small>Exportar para Excel</small></button>

                    </div>
                    <div class="card-body">


                    <table id="myTable" class="display " style="width:100%">
                        <thead>
                            <tr>
                                <th><small>NOME</small></th>
                                <th><small>TELEFONE</small></th>
                                <th><small>DISPOSITIVO</small></th>

                                <th><small>ORIGEM</small></th>
                                <th><small>ENTRADA</small></th>
                                <th><small>CONTACTADO</small></th>
                                <th><small>VIA</small></th>
                                <th><small>DATA CONTATO</small></th>
                                <th><small></small></th>

                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($this->admin_model->get_prospecoes_by_campanha($campanha['id']) as $c) { ?>
                            <tr>
                                <td><small><?php if ($this->admin_model->get_person($c->lead_id)) {
                                              echo "<a href='".base_url()."persona/editar/".$c->id."' target='_blank'>".$this->admin_model->get_person($c->lead_id)['nome']."</a>";
                                            }; ?></small></td>

                                <td><small><?php if ($this->admin_model->get_telefones_validated($c->lead_id)) {
                                              echo $this->admin_model->get_telefones_validated($c->lead_id)['ddd'] . $this->admin_model->get_telefones_validated($c->lead_id)['telefone'];
                                            } else {
                                              echo "-";
                                            } ?></small></td>
                                <td><small title="<?= $c->lead_ip ?>" style="text-transform: uppercase;"><?= $c->lead_dispositivo ?></small></td>

                                <td><small class="text-uppercase"><?= $c->origem_type ?></small></td>
                                <td><small><?= $c->data_acesso ?></small></td>
                                <td><small><?php

                                            if ($c->contactado == 0) {
                                              echo "NAO";
                                            } else if ($c->contactado == 1) {
                                              echo "SIM";
                                            } else {
                                              echo "-";
                                            }


                                            ?></small></td>
                                <td><small class="text-uppercase"><?= $c->contactado_via ?></small></td>
                                <td><?= $this->admin_model->convertDate($c->contactado_data) ?></td>
    <td>       
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a  class="dropdown-item"  onclick="openEdit(<?= $c->id ?>)" data-bs-toggle="modal" data-bs-target="#modalAdicionarEvento"  href="#"
                                      ><i class="bx bx-edit-alt me-1"></i> Editar</a >



                                    <span onclick="delete_prospeccao(<?= $c->id ?>)" class="dropdown-item" href="#"
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
                                <h5 class="modal-title" id="exampleModalLabel1">ADICIONAR EVENTO</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">

                              <form id="form-update-prospeccao" >
                          
                                  <div class="row">
                                    <div class="col mb-3">

                                    <input type="hidden" id="update_id" required name="id" value="" class="form-control"  />


                                    <!-- <label for="nameBasic" class="form-label">NOME</label>
                                    <p class="text-uppercase">Daniel Ribeiro do Amaral</p> -->
                                   

                                    <label for="nameBasic" class="form-label">CONTACTADO</label>
                                    <select id="update_contactado" name="contactado" class="form-select"  >
                                      <option  value="">Selecionar</option>
                                      <option  value="0">NAO</option>
                                      <option  value="1">SIM</option>

                                     </select><br>

                                    <label for="nameBasic" class="form-label">VIA DE CONTATO</label>
                                    <select id="update_contactado_via" name="contactado_via" class="form-select"  >
                                      <option selected value="">Selecionar</option>
                                      <option  value="email">E-MAIL</option>
                                      <option  value="whatsapp">WHATSAPP</option>
                                      <option  value="instagram">INSTAGRAM</option>
                                      <option  value="twitter">TWITTER</option>
                                      <option  value="facebook">FACEBOOK</option>
                                      <option  value="tiktok">TIKTOK</option>

                                     </select><br>

                                    <label for="nameBasic" class="form-label">DATA DE CONTATO</label>
                                    <input type="text" id="update_contactado_data" name="contactado_data" class="form-control">

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


<script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

    <?php

    $c = [];

    foreach ($this->admin_model->get_prospecoes_by_campanha($campanha['id']) as $l) {


      if ($l->contactado == 0) {
        $contactado = "NAO";
      } else if ($l->contactado == 1) {
        $contactado = "SIM";
      } else {
        $contactado = "";
      }

      array_push($c, array(
        "NOME" => $this->admin_model->get_person($l->lead_id)['nome'],
        "TELEFONE" => $this->admin_model->get_telefones_validated($l->lead_id)['telefone'],
        "ORIGEM" => $l->origem_type,
        "ENTRADA" => $this->admin_model->convertDate($l->data_acesso),
        "CONTACTADO" => $contactado,
        "VIA" => $l->contactado_via,
        "DATA CONTATO" => $this->admin_model->convertDate($l->contactado_data)

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
          saveAs(blob, "prospeccoes-<?= str_replace(" ", "-", $campanha['nome']) ?>.xlsx");
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
   let table = new DataTable('#myTable');
</script>
<script>

        $('#form-update-prospeccao').on('submit', function(e) {

            e.preventDefault()

            var form = $(this).serialize()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>sales/act_update_prospeccao',
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

<script>




  function openEdit(id) {

    $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>sales/act_get_prospeccao_data',
                data: {
                  id:id
                },
                success: function(data) {
                    var resp = JSON.parse(data)

                    if (resp.status != "false") {

                        var id = resp.id
                        var contactado = resp.contactado
                        var contactado_via = resp.contactado_via
                        var contactado_data = resp.contactado_data

                        $('#update_id').val(id)
                        $('#update_contactado').val(contactado)
                        $('#update_contactado_via').val(contactado_via)


                        if (contactado_data.length > 0 ) {
                          $('#update_contactado_data').val(contactado_data)

                        } else {
                          $('#update_contactado_data').val("<?= date('d-m-Y H:i:s') ?>")

                        }


                    } else {
                        alert('Erro ao adicionar!')
                    }
                },
                error: function(data) {
                    alert('Ocorreu um erro temporário.');
                },
            });

  }


</script>


<script>

     function delete_prospeccao(id) {

        var resposta = confirm("Você deseja excluir?");

        if (resposta === true) {
            // O usuário pressionou "OK"

            
            $.ajax({
                        method: 'POST',
                        url: '<?= base_url() ?>sales/act_delete_prospeccao',
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