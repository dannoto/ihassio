<!DOCTYPE html>


<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Relatórios</title>

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

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
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
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              <li class="nav-item lh-1 me-3">
                <a class="github-button" href="https://github.com/themeselection/sneat-html-admin-template-free" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
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
              <a href="<?= base_url() ?>sales/campanhas_produtos/<?= $campanha['produto'] ?>">
                <button class="btn btn-light text-primary border border-0"> <span class="bx bx-left-arrow-alt"></span> VOLTAR </button>
              </a>
            </div>
            <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light"></span> <?= $campanha['nome'] ?></h4>

            <!-- Basic Layout & Basic with Icons -->
            <div class="row">

              <!-- Basic Layout -->
              <div class="col-xxl">


                <div class="card mb-4">

                <?=$campanha['provedor']?>
                  <?php if ($campanha['provedor'] == "xmailer") { ?>

                    <div class="card-header d-flex align-items-center justify-content-between">
                      <div>
                        <h5>RELATÓRIOS</h5>
                        <p>Relatórios e KPI's da campanha.</p>
                      </div>
                    </div>

                  <?php } else { ?>

                    <div class="card-header d-flex align-items-center justify-content-between">


                      <div>
                        <h5>RELATÓRIOS</h5>
                        <p>Relatórios e KPI's da campanha.</p>
                      </div>

                      <div class="card-body">


                        <div class="row">
                          <h3>KPI's POR E-MAIL</h3>

                          <div class="row">
                            <div class="col-md-3 text-center card  m-1 mb-3 pt-3 mr-5 p-3 ">
                              <h2></h2>
                              <p>ENVIADOS</p>
                            </div>
                            <div class="col-md-3 text-center card  m-1 mb-3 pt-3 mr-5 p-3 ">
                              <h2><?=count($this->admin_model->get_aberturas($campanha['id']))?></h2>
                              <p>ABERTURAS</p>
                            </div>
                            <div class="col-md-3 text-center card  m-1 mb-3 pt-3 mr-5 p-3 ">
                              <h2><?=count($this->admin_model->get_prospecoes_by_campanha($campanha['id']))?></h2>
                              <p>CLIQUES</p>
                            </div>
                            <div class="col-md-3 text-center card  m-1 mb-3 pt-3 mr-5 p-3 ">
                              <h2><?=count($this->admin_model->get_vendas_by_campanha($campanha['id']))?></h2>
                              <p>VENDAS</p>
                            </div>
                          </div>

                        </div>
                      </div>
                      <!-- <button id="exportBtn" class="btn btn-primary text-uppercase mb-3" onclick=""><small>Exportar para Excel</small></button> -->
                    </div>
                    <?php

                    $brevo = $this->brevo_model->getCampanhasReport($campanha['provedor_campanha_id']);

                    ?>
                    <?php

                    function printSpecificStatistics($brevo)
                    {


                      // print_r($brevo['statistics']);
                      $specificStats = array();

                      foreach ($brevo['statistics'] as $v => $c) {



                        if ($v == "campaignStats") {

                          foreach ($c as $i) {

                            $specificStats['uniqueClicks'] = $i->uniqueClicks;
                            $specificStats['clickers'] = $i->clickers;
                            $specificStats['complaints'] = $i->complaints;
                            $specificStats['delivered'] = $i->delivered;
                            $specificStats['sent'] = $i->sent;
                            $specificStats['softBounces'] = $i->softBounces;
                            $specificStats['hardBounces'] = $i->hardBounces;
                            $specificStats['uniqueViews'] = $i->uniqueViews;
                            $specificStats['trackableViews'] = $i->trackableViews;
                            $specificStats['unsubscriptions'] = $i->unsubscriptions;
                            $specificStats['viewed'] = $i->viewed;
                            $specificStats['deferred'] = $i->deferred;
                          }

                          // echo $v;
                          // echo "<br>";

                          // print_r($c);
                          // echo "<br>";

                        }
                      }

                      return $specificStats;
                    }

                    $email_data = printSpecificStatistics($brevo);


                    ?>
                    <div class="card-body">


                      <div class="row">

                        <h3>KPI's POR E-MAIL</h3>

                        <div class="row">
                          <div class="col-md-3 text-center card  m-1 mb-3 pt-3 mr-5 p-3 ">
                            <h2> <?= $email_data['sent'] ?> <span style="font-size: 10px;"><?php echo round(($email_data['delivered'] / $email_data['sent']), 2) * 100; ?>%</span></h2>
                            <p>ENVIADOS</p>
                          </div>
                          <div class="col-md-3 text-center card  m-1 mb-3 pt-3 mr-5 p-3 ">
                            <h2>R$ <?php $custo = round($email_data['sent']  * 0.003, 2);
                                    echo $custo; ?></h2>
                            <p>CUSTO</p>
                          </div>


                          <div class="col-md-3 text-center card  m-1 mb-3 pt-3 mr-5 p-3 ">
                            <h2><?php $view = $email_data['uniqueViews'];
                                echo $view; ?> <span style="font-size: 10px;"><?php echo round(($email_data['uniqueViews'] / $email_data['sent']), 2) * 100; ?>%</span></h2>
                            <p>VIEWS ÚNICAS</p>
                          </div>


                          <div class="col-md-3 text-center card  m-1 mb-3 pt-3 mr-5 p-3 ">
                            <h2>R$ <?php $cpv = round(($custo / $view), 2);
                                    echo $cpv; ?></h2>
                            <p>CUSTO POR VIEW (CPV)</p>
                          </div>
                          <div class="col-md-3 text-center card  m-1 mb-3 pt-3 mr-5 p-3 ">
                            <h2>R$ <?php $cpm = round(($cpv * 1000), 2);
                                    echo $cpm; ?></h2>
                            <p>CUSTO POR MIL (CPM)</p>
                          </div>




                          <div class="row">
                            <div class="col-md-3 text-center card  m-1 mb-3 pt-3 mr-5 p-3 ">
                              <h2><?php $cliques = $email_data['uniqueClicks'];
                                  echo $cliques; ?> <span style="font-size: 10px;"><?php echo round(($email_data['uniqueClicks'] / $email_data['sent']), 2) * 100; ?>%</span> </h2>
                              <p>CLIQUES</p>
                            </div>
                            <div class="col-md-3 text-center card  m-1 mb-3 pt-3 mr-5 p-3 ">
                              <h2>R$ <?php $cpv = round(($custo / $cliques), 2);
                                      echo $cpv; ?></h2>
                              <p>CUSTO POR CLIQUE (CPC)</p>
                            </div>

                          </div>


                          <div class="row">
                            <div class="col-md-3 text-center card  m-1 mb-3 pt-3 mr-5 p-3 ">
                              <h2><?php $vendas = count($this->admin_model->get_vendas_by_campanha($campanha['id'], 'email'));
                                  echo $vendas; ?></span> </h2>
                              <p>VENDAS POR E-MAIL</p>
                            </div>
                            <div class="col-md-3 text-center card  m-1 mb-3 pt-3 mr-5 p-3 ">
                              <h2>R$ <?php if ($vendas == 0) {
                                        echo $custo;
                                      } else {
                                        $cpa = round(($custo / $vendas), 2);
                                        echo $cpa;
                                      } ?></h2>
                              <p>CUSTO POR VENDAS (CPA)</p>
                            </div>

                            <div class="col-md-3 text-center card  m-1 mb-3 pt-3 mr-5 p-3 ">

                              <h2>R$ <?php $faturamento = round($vendas *  $this->admin_model->get_produto($campanha['produto'])['preco'], 2);
                                      echo $faturamento; ?></h2>
                              <p>FATURAMENTO </p>
                            </div>

                          </div>



                        </div>
                        <br><br>
                        <div class="row">
                          <br><br>
                          <h3 class="mt-5">ESTATÍSTICAS POR WHATSAPP</h3>
                          <br>
                          <div class="col-md-3 text-center card  m-1 mb-3 mr-5 p-3 ">
                            <h5>12345 <span style="font-size: 12px;">25%</span></h5>
                            <p>VENDAS POR EMAIL</p>
                          </div>

                          <div class="col-md-3 text-center card  m-1 mb-3 mr-5 p-3 ">
                            <h5>12345 <span style="font-size: 12px;">25%</span></h5>
                            <p>VENDAS POR WHATSAPP</p>
                          </div>

                          <div class="col-md-3 text-center card  m-1 mb-3 mr-5 p-3 ">
                            <h5>12345 <span style="font-size: 12px;">25%</span></h5>
                            <p>VENDAS POR ANÚNCIOS</p>
                          </div>
                        </div>
                        <br><br>

                        <div class="row">
                          <div class="col-md-3 text-center card  m-1 mb-3 mr-5 p-3 ">
                            <h5>40 </h5>
                            <p>VENDAS TOTAIS</p>
                          </div>

                          <div class="col-md-3 text-center card  m-1 mb-3 mr-5 p-3 ">
                            <h5>R$ 50.000 </h5>
                            <p>FATURAMENTO TOTAL</p>
                          </div>
                        </div>
                  <?php } ?>

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



    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.9/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.9/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

    <script>
      $(document).ready(function() {
        // Configurar o DataTables
        var table = $('#myTable').DataTable();

        // Exportar para Excel
        $('#exportBtn').on('click', function() {
          // Obter o conteúdo da tabela utilizando o DataTables
          var tableData = table.data().toArray();

          // Criar um objeto Workbook do Excel
          var workbook = XLSX.utils.book_new();

          // Criar uma planilha no Workbook
          var worksheet = XLSX.utils.aoa_to_sheet([
            ["NOME", "E-MAIL", "DATA DE INCLUSÃO", "UNSUBSCRIBE"]
          ]);

          // Preencher a planilha com os dados da tabela
          var rows = tableData.map(function(row) {
            return row.map(function(value) {
              return '' + value + '';
            });
          });

          XLSX.utils.sheet_add_aoa(worksheet, rows);

          // Adicionar a planilha ao Workbook
          XLSX.utils.book_append_sheet(workbook, worksheet, "Dados");

          // Converter o Workbook para um arquivo binário do Excel
          var excelData = XLSX.write(workbook, {
            type: "binary"
          });

          // Criar o Blob e fazer o download
          var blob = new Blob([s2ab(excelData)], {
            type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
          });
          saveAs(blob, "dados.xlsx");
        });

        // Função auxiliar para converter uma string para um ArrayBuffer
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
      $('#form-add-campanha').on('submit', function(e) {
        e.preventDefault()

        var form = $(this).serialize()

        $.ajax({
          method: 'POST',
          url: '<?= base_url() ?>sales/act_add_campanha',
          data: form,
          success: function(data) {
            var resp = JSON.parse(data)

            if (resp.status == "true") {

              alert('Adicionado com sucesso!')
              window.location.href = "<?= base_url() ?>sales/campanhas"

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