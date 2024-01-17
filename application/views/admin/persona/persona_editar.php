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

    <title>Persona Editar - <?=$p['nome']?></title>

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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Persona /</span> Editar</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                
              </div>
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <!-- <h5 class="mb-0">Basic Layout</h5>
                      <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                    <h6 class="text-uppercase mb-3">Informações Pessoais</h6>

                      <form id="form-update-pessoa">
                        <input    value="<?= $p['id'] ?>" type="hidden" name="id" class="form-control" id="basic-default-name" placeholder="" />

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">NOME</label>
                          <div class="col-sm-10">
                            <input value="<?= $p['nome'] ?>" type="text" name="nome" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>



                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">CPF / CNPJ</label>
                          <div class="col-sm-10">
                            <input    value="<?= $p['cpf'] ?>" type="text" name="cpf" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>

                        <div class="row mb-3">
                        <label for="html5-date-input" class="col-md-2 col-form-label">NASCIMENTO</label>
                                                  <div class="col-sm-10">
                          <input  value="<?= $p['nascimento'] ?>"  class="form-control" type="date" name="nascimento" value="" id="html5-date-input">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">RG</label>
                          <div class="col-sm-10">
                            <input  value="<?= $p['rg'] ?>" type="text" name="rg" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">PIS</label>
                          <div class="col-sm-10">
                            <input  value="<?= $p['pis'] ?>"type="text" name="pis" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">CNS</label>
                          <div class="col-sm-10">
                            <input   value="<?= $p['cns'] ?>" type="text" name="cns" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>


                        <hr>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">SEXO</label>
                            <div class="col-sm-10">
                                <select  value="<?= $p['sexo'] ?>" name="sexo" class="form-select"  >
                                  <option value="">Selecionar</option>
                                    <option <?php if ($p['sexo'] == "masculino") {
                                              echo "selected";
                                            } ?> value="masculino">Masculino</option>
                                    <option <?php if ($p['sexo'] == "feminino") {
                                              echo "selected";
                                            } ?> value="feminino">Feminino</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">TIPO</label>
                            <div class="col-sm-10">
                                <select  value="<?= $p['tipo'] ?>" name="tipo" class="form-select"  >
                                <option value="">Selecionar</option>

                                    <option <?php if ($p['tipo'] == "pessoa_fisica")   { echo "selected"; } ?> value="pessoa_fisica">Pessoa Física</option>
                                    <option <?php if ($p['tipo'] == "pessoa_juridica") { echo "selected";} ?> value="pessoa_juridica">Pessoa Jurídica</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">SIGNO</label>
                            <div class="col-sm-10">
                                <select  value="<?= $p['signo'] ?>" name="signo" class="form-select"  >
                                <option value="">Selecionar</option>

                                <option <?php if ($p['signo'] == "aries") {
                                          echo "selected";
                                        } ?> value="aries">Áries</option>
                                <option <?php if ($p['signo'] == "touro") {
                                          echo "selected";
                                        } ?> value="touro">Touro</option>
                                <option <?php if ($p['signo'] == "gemeos") {
                                          echo "selected";
                                        } ?> value="gemeos">Gêmeos</option>
                                <option <?php if ($p['signo'] == "cancer") {
                                          echo "selected";
                                        } ?> value="cancer">Câncer</option>
                                <option <?php if ($p['signo'] == "leao") {
                                          echo "selected";
                                        } ?> value="leao">Leão</option>
                                <option <?php if ($p['signo'] == "virgem") {
                                          echo "selected";
                                        } ?> value="virgem">Virgem</option>
                                <option <?php if ($p['signo'] == "libra") {
                                          echo "selected";
                                        } ?> value="libra">Libra</option>
                                <option <?php if ($p['signo'] == "escorpiao") {
                                          echo "selected";
                                        } ?> value="escorpiao">Escorpião</option>
                                <option <?php if ($p['signo'] == "sagitario") {
                                          echo "selected";
                                        } ?> value="sagitario">Sagitário</option>
                                <option <?php if ($p['signo'] == "capricornio") {
                                          echo "selected";
                                        } ?> value="capricornio">Capricórnio</option>
                                <option <?php if ($p['signo'] == "aquario") {
                                          echo "selected";
                                        } ?> value="aquario">Aquário</option>
                                <option <?php if ($p['signo'] == "peixes") {
                                          echo "selected";
                                        } ?> value="peixes">Peixes</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">ESCOLARIDADE</label>
                            <div class="col-sm-10">
                                <select value="<?= $p['escolaridade'] ?>" name="escolaridade" class="form-select">
                                <option value="">Selecionar</option>

                                    <option <?php if ($p['escolaridade'] == "fundamental_incompleto") {
                                              echo "selected";
                                            } ?> value="fundamental_incompleto">Fundamental Incompleto</option>
                                    <option <?php if ($p['escolaridade'] == "fundamental_completo") {
                                              echo "selected";
                                            } ?> value="fundamental_completo">Fundamental Completo</option>
                                    <option <?php if ($p['escolaridade'] == "ensino_medio_incompleto") {
                                              echo "selected";
                                            } ?> value="ensino_medio_incompleto">Ensino Médio Incompleto</option>
                                    <option <?php if ($p['escolaridade'] == "ensino_medio_completo") {
                                              echo "selected";
                                            } ?> value="ensino_medio_completo">Ensino Médio Completo</option>
                                    <option <?php if ($p['escolaridade'] == "tecnico") {
                                              echo "selected";
                                            } ?> value="tecnico">Técnico</option>
                                    <option <?php if ($p['escolaridade'] == "graduacao") {
                                              echo "selected";
                                            } ?> value="graduacao">Graduação</option>
                                    <option <?php if ($p['escolaridade'] == "pos_graduacao") {
                                              echo "selected";
                                            } ?> value="pos_graduacao">Pós-Graduação</option>
                                    <option <?php if ($p['escolaridade'] == "mestrado") {
                                              echo "selected";
                                            } ?> value="mestrado">Mestrado</option>
                                    <option <?php if ($p['escolaridade'] == "doutorado") {
                                              echo "selected";
                                            } ?> value="doutorado">Doutorado</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">NACIONALIDADE</label>
                            <div class="col-sm-10">
                              <select value="<?= $p['nacionalidade'] ?>" name="nacionalidade" class="form-select">
                              <option value="">Selecionar</option>

                                  <option <?php if ($p['nacionalidade'] == "brasil") {
                                            echo "selected";
                                          } ?> value="brasil">Brasil</option>
                        
                              </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">RAÇA</label>
                            <div class="col-sm-10">
                            <select  value="<?= $p['raca'] ?>" name="raca" class="form-select">
                            <option value="">Selecionar</option>

                              <option <?php if ($p['raca'] == "branca") {
                                        echo "selected";
                                      } ?>  value="branca">Branca</option>
                              <option <?php if ($p['raca'] == "negra") {
                                        echo "selected";
                                      } ?>  value="negra">Negra</option>
                              <option <?php if ($p['raca'] == "parda") {
                                        echo "selected";
                                      } ?>  value="parda">Parda</option>
                              <option <?php if ($p['raca'] == "amarela") {
                                        echo "selected";
                                      } ?>  value="amarela">Amarela</option>
                              <option <?php if ($p['raca'] == "indigena") {
                                        echo "selected";
                                      } ?>  value="indigena">Indígena</option>
                              <option <?php if ($p['raca'] == "outra") {
                                        echo "selected";
                                      } ?>  value="outra">Outra</option>
                          </select>
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">RENDA</label>
                          <div class="col-sm-10">
                            <input value="<?= $p['renda'] ?>" type="text" name="renda" class="form-control" id="basic-default-name" placeholder="" />
                          </div>
                        </div>

                       
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">ESTADO</label>
                            <div class="col-sm-10">
                            <select  value="<?= $p['estado'] ?>" onchange="getCidades(this.value)" name="estado" id="estado" class="form-select">
                              <option value="">Selecionar</option>
                              <?php foreach ($this->admin_model->get_estados() as $e) { ?>
                                <option <?php if ($p['estado'] == $e->id) {
                                          echo "selected";
                                        } ?>  value="<?= $e->id ?>"><?= $e->nome ?></option>
                                <?php } ?>
                          </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">CIDADE</label>
                            <div class="col-sm-10">
                            <select required value="<?= $p['cidade'] ?>" name="cidade" id="cidade" class="form-select">
            
                            </select>
                            </div>
                        </div>


                        <hr>

                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">VALIDAÇÃO E-MAIL</label>
                          <div class="col-sm-10">
                          <select  value="<?= $p['validacao_email'] ?>" name="validacao_email" class="form-select">
                          <option   value="">SELECIONAR</option>

                              <option <?php if ($p['validacao_email'] == "1") { echo "selected"; } ?>  value="1">SIM</option>
                              <option <?php if ($p['validacao_email'] == "2") { echo "selected"; } ?>  value="2">IMPRECISO</option>

                              <option <?php if ($p['validacao_email'] == "0") { echo "selected"; } ?>  value="0">NÃO</option>

                          </select>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">VALIDAÇÃO TELEFONE</label>
                          <div class="col-sm-10">
                          <select  value="<?= $p['validacao_telefone'] ?>" name="validacao_telefone" class="form-select">
                          <option   value="">SELECIONAR</option>

                              <option <?php if ($p['validacao_telefone'] == "1") { echo "selected"; } ?>  value="1">SIM</option>
                              <option <?php if ($p['validacao_telefone'] == "2") { echo "selected"; } ?>  value="2">IMPRECISO</option>

                              <option <?php if ($p['validacao_telefone'] == "0") { echo "selected"; } ?>  value="0">NÃO</option>

                          </select>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1" class="form-label">VALIDAÇÃO PERFIL</label>
                          <div class="col-sm-10">
                          <select  value="<?= $p['validacao_perfil'] ?>" name="validacao_perfil" class="form-select">
                          <option   value="">SELECIONAR</option>

                              <option <?php if ($p['validacao_perfil'] == "1") { echo "selected"; } ?>  value="1">SIM</option>
                              <option <?php if ($p['validacao_perfil'] == "2") { echo "selected"; } ?>  value="2">IMPRECISO</option>

                              <option <?php if ($p['validacao_perfil'] == "0") { echo "selected"; } ?>  value="0">NÃO</option>

                          </select>
                          </div>
                      </div>


                      
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" style="width: 100%;" class="btn mt-5 btn-block btn-primary">SALVAR</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <br><br>
                  </div>                    
                  <div class="card mb-4">

                    <div class="card-body">
                      <h6 class="text-uppercase mb-3">E-mails</h6>
                      <form id="form-update-pessoa">
                        
                        <div class="row justify-content-start mb-3">
                          <div class="col-sm-10">
                            <button type="button"  data-bs-toggle="modal" data-bs-target="#modalAdicioniarEmail" class="btn btn-block btn-primary">ADICIONAR</button>
                          </div>
                        </div>

                        <div class="table-responsive text-nowrap">
                          <table class="table">
                                    <thead>
                                      <tr>
                                      <th>E-MAIL</th>
                                      <th>VALIDADO</th>
                                    
                                    </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                      <?php foreach ($this->admin_model->get_emails($p['id']) as $c) { ?>
                                    <tr>
                                      <td><?= $c->email ?></td>
                                     
                                      <td>

                                        <?php if ($c->is_validado == 0) { ?>
                                          <span class="badge bg-label-danger me-1">nao</span>

                                        <?php } else if ($c->is_validado == 1) { ?>

                                          <span class="badge bg-label-success me-1">SIM</span>

                                    
                                        <?php } else if ($c->is_validado == 2) { ?>

                                        <span class="badge bg-label-warning me-1">IMPRECISO</span>

                                        <?php }  ?>

                                      </td>
                                      <td>
                                        <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                           
                                            <a onclick="delete_email(<?= $c->id ?>)" class="dropdown-item" href="javascript:void(0);"
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

                      </form>
                    </div>

                  </div>

                  <div class="card mb-4">

                    <div class="card-body">
                      <h6 class="text-uppercase mb-3">Telefones</h6>
                      <form id="form-update-pessoa">
                        
                        <div class="row justify-content-start">
                          <div class="col-sm-10">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalAdicioniarTelefone"  class="btn mb-3 btn-block btn-primary">ADICIONAR</button>
                          </div>
                        </div>

                        <div class="table-responsive text-nowrap">
                          <table class="table">
                                    <thead>
                                      <tr>
                                      <th>DDD</th>
                                      <th>Telefone</th>
                                      <th>Validado</th>

                                    </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                      <?php foreach ($this->admin_model->get_telefones($p['id']) as $c) { ?>
                                    <tr>
                                    <td><?= $c->ddd ?></td>
                                    <td><?= $c->telefone ?></td>

                                     <td>

                                       <?php if ($c->is_validado == 0) { ?>
                                        <span class="badge bg-label-danger me-1">nao</span>

                                       <?php } else { ?>
                                        <span class="badge bg-label-success me-1">SIM</span>

                                       <?php }  ?>

                                     </td>
                                      <td>
                                        <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                           
                                            <a onclick="delete_telefone(<?= $c->id ?>)" class="dropdown-item" href="javascript:void(0);"
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

                      </form>
                    </div>
                  </div>

                  <div class="card mb-4">

                    <div class="card-body">
                      <h6 class="text-uppercase mb-3">Redes Sociais</h6>
                      <form id="form-update-pessoa">
                        
                        <div class="row justify-content-start">
                          <div class="col-sm-10">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalAdicioniarSocial"  class="btn mb-3 btn-block btn-primary">ADICIONAR</button>
                          </div>
                        </div>

                        <div class="table-responsive text-nowrap">
                          <table class="table">
                                    <thead>
                                      <tr>
                                      <th>NOME</th>
                                      <th>username</th>

                                      <th>Url</th>
                                      <th>status</th>
                                      <th>intensidade</th>

                                    </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                      <?php foreach ($this->admin_model->get_sociais($p['id']) as $c) { ?>
                                    <tr>
                                    <td><?= $c->nome ?></td>
                                    <td><?= $c->username ?></td>
                                    <td><a href="<?= $c->url ?>" target="_blank"><?= $c->url ?></a></td>

                                    <td>
                                       <?php if ($c->status == 0) { ?>
                                        <span class="badge bg-label-success me-1">ACESSIVEL</span>

                                       <?php } else { ?>

                                        <span class="badge bg-label-danger me-1">PRIVADO</span>

                                       <?php }  ?>

                                     </td>
                                     <td><?= $c->intensividade ?></td>

                                    <td>
                                        <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                           
                                            <a onclick="delete_social(<?= $c->id ?>)" class="dropdown-item" href="javascript:void(0);"
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

                      </form>
                    </div>

                  </div>


                  <!--  Classificaçao -->
                  <div class="card mb-4" id="clcp">

                            <div class="card-body">
                              <h6 class="text-uppercase mb-3">Classificaçao de Perfil</h6>
                              <form id="form-update-pessoa">
                                
                                <div class="row justify-content-start">
                                  <div class="col-sm-6">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalAdicioniarClassificacao"  class="btn mb-3 btn-block btn-primary">ADICIONAR</button>
                                  </div>
                                  <div class="col-sm-6">

                                  <?php


                                  if ($this->admin_model->countTageddImages($p['id'] )  ) {

                                    $id = $this->admin_model->getLastTageddImagex($p['id'] )['imagem_id'];
                                    $im = $this->admin_model->getLastTageddImagex($p['id'] )['imagem_id'];
                                    if ( strlen($im) > 0 ) {

                                    echo '<a href="'.base_url().'classificador/u/'.$p['id'].'/'.$id.' ">';

                                  } else {
                                    echo '<a href="#clcp">';

                                  }
                                  } else {

                                    if (count($this->admin_model->getFirstTageddImage($p['id'] )) > 0) {

                                      $id = $this->admin_model->getFirstTageddImagex($p['id'] )['id'];

                                      
                                        echo '<a href="'.base_url().'classificador/u/'.$p['id'].'/'.$id.' ">';


                                    } else {

                                      echo '<a href="#clcp">';

                                    }

                                  }

                                 
                                  
                                  
                                  ?>
                                  <button type="button"class="btn mb-3 btn-block btn-success" > <span class="bx bx-image-add"></span>CLASSIFICADOR</button>

                                  </a>
                                  </div>
                                </div>

                                <div class="row">
                                    <?php foreach ($this->admin_model->get_categorias() as $e) { ?>

                                
                                      <div class="card mb-2 accordion-item ">
                                        <h2 class="accordion-header " id="headingTwo">
                                          <button
                                            type="button"
                                            class="accordion-button collapsed <?php
                                                                              if ($this->admin_model->get_classificacao_intensidade($p['id'], $e->id)) {


                                                                                if ($this->admin_model->get_classificacao_intensidade($p['id'], $e->id)['intensidade_id'] == "1") {
                                                                                  echo " text-success";
                                                                                } else  if ($this->admin_model->get_classificacao_intensidade($p['id'], $e->id)['intensidade_id'] == "2") {
                                                                                  echo "text-warning ";
                                                                                } else  if ($this->admin_model->get_classificacao_intensidade($p['id'], $e->id)['intensidade_id'] == "3") {
                                                                                  echo "text-danger";
                                                                                } else {
                                                                                  echo "";
                                                                                }
                                                                              }

                                                                              ?>"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#accordion<?= $e->id ?>"
                                            aria-expanded="false"
                                            aria-controls="accordion<?= $e->id ?>"
                                          >
                                            
                                            <span> <?= $e->nome ?>  <small>(<?= count($this->admin_model->get_classificacoes_by_cat($e->id,  $p['id'])) ?>)</small></span>

                                          </button>
                                        </h2>
                                        <div
                                          id="accordion<?= $e->id ?>"
                                          class="accordion-collapse collapse   "
                                          aria-labelledby="headingTwo"
                                          data-bs-parent="#accordionExample"


                                        >
                                          <div class="accordion-body">

                                          <div class="row mb-2 mt-2">
                                            <div class="col-md-6">
                                           
                                              <span>INTENSIDADE</span><br>
                                              <select onchange="updateIntensidade(<?= $p['id'] ?>, <?= $e->id ?>, this.value)" name="" class="form-select" id="">
                                                <option <?php if ($this->admin_model->get_classificacao_intensidade($p['id'], $e->id)) {
                                                          if ($this->admin_model->get_classificacao_intensidade($p['id'], $e->id)['intensidade_id'] == "0") {
                                                            echo "selected";
                                                          }
                                                        }  ?> value="0">Selecionar</option>

                                                <option <?php if ($this->admin_model->get_classificacao_intensidade($p['id'], $e->id)) {
                                                          if ($this->admin_model->get_classificacao_intensidade($p['id'], $e->id)['intensidade_id'] == "1") {
                                                            echo "selected";
                                                          }
                                                        }  ?>  value="1">Baixa</option>
                                                <option  <?php if ($this->admin_model->get_classificacao_intensidade($p['id'], $e->id)) {
                                                            if ($this->admin_model->get_classificacao_intensidade($p['id'], $e->id)['intensidade_id'] == "2") {
                                                              echo "selected";
                                                            }
                                                          }  ?>  value="2">Media</option>
                                                <option  <?php if ($this->admin_model->get_classificacao_intensidade($p['id'], $e->id)) {
                                                            if ($this->admin_model->get_classificacao_intensidade($p['id'], $e->id)['intensidade_id'] == "3") {
                                                              echo "selected";
                                                            }
                                                          }  ?>  value="3">Alta</option>

                                              </select>

                                            </div>
                                            <div class="col-md-6">
                                              <span>CLASSIFICAR</span><br>
                                              <button type="button" onclick="openClassificar(<?= $e->id ?>)"  data-bs-toggle="modal" data-bs-target="#modalAdicioniarClassificacao" class="btn btn-primary">+ ADICIONAR</button>
                                            </div>
                                          </div>


                                           
                                          <div class="table-responsive text-nowrap">
                                  <table class="table">
                                            <thead>
                                              <tr>
                                              <th>categoria</th>
                                              <th>subcategoria</th>
                                              <th>tags</th>
                                              <th>intensividade</th>

                                            </tr>
                                          </thead>
                                          <tbody class="table-border-bottom-0">
                                              <?php foreach ($this->admin_model->get_classificacoes_by_cat($e->id, $p['id']) as $c) { ?>
                                            <tr>
                                            <td><?= $this->admin_model->get_categoria($c->categoria_id)['nome']   ?></td>
                                            <td><?= $this->admin_model->get_subcategoria($c->subcategoria_id)['nome'] ?></td>
                                            <td><?= $this->admin_model->get_item($c->tag_id)['nome']  ?></td>

                                            <td>
                                              <?php if ($c->intensividade_id == 1) { ?>
                                                <span class="badge bg-label-success me-1">Baixa</span>

                                              <?php } else if ($c->intensividade_id == 3) { ?>

                                                <span class="badge bg-label-danger me-1">Alta</span>

                                              <?php } else if ($c->intensividade_id == 5) { ?>

                                                <span class="badge bg-label-warning me-1">Média</span>


                                              <?php }  ?>

                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                  </button>
                                                  <div class="dropdown-menu">
                                                  
                                                    <a onclick="delete_classificacao(<?= $c->id ?>)" class="dropdown-item" href="javascript:void(0);"
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
                                        </div>
                                      </div>
                    
                                    <?php }  ?>

                                </div>
       
                               
                              </form>
                            </div>

                            </div>
                                        <!-- Classificaçao -->
                

                   </div>
                </div>
                <!-- Basic with Icons -->
               
              </div>
            </div>
            <!-- / Content -->



                  <!-- Basic Bootstrap Table -->
                  <!-- <button class="btn btn-primary mt-2 mb-3"  type="button" data-bs-toggle="modal" data-bs-target="#modalAdicioniarEmail">+ ADICIONAR</button> -->


        <!-- Modal -->
        <div class="modal fade" id="modalAdicioniarEmail" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Novo E-mail</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">

              <form id="form-add-email" >
                <div class="row">

                    <input type="hidden" required name="person_id" value="<?= $p['id'] ?>" class="form-control"  />
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label">E-mail</label>
                      <input type="email" required name="email" class="form-control"  />
                    </div>
                  </div>
                  

                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label">validado</label>
                      <select class="form-select" name="is_validado">
                          <option value="0">NAO</option>
                          <option value="1">SIM</option>
                          <option value="2">IMPRECISO</option>

                      </select>
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

        <div class="modal fade" id="modalAdicioniarTelefone" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Novo Telefone</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">

              <form id="form-add-telefone" >
                <div class="row">

                    <input type="hidden" required name="person_id" value="<?= $p['id'] ?>" class="form-control"  />


                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label">DDD</label>
                      <input type="text" required name="ddd" class="form-control"  />
                    </div>
                  </div>

                  <div class="row">



                  <div class="col mb-3">
                    <label for="nameBasic" class="form-label">Telefone</label>
                    <input type="text" required name="telefone" class="form-control"  />
                  </div>
                  </div>
                            

                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label">validado</label>
                      <select class="form-select" name="is_validado">
                          <option value="0">NAO</option>
                          <option value="1">SIM</option>

                      </select>
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

        <div class="modal fade" id="modalAdicioniarSocial" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Novo Social</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">

              <form id="form-add-social" >

              
              <div class="row">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label">nome</label>
                      <select class="form-select" name="nome">
                          <option value="instagram">Instagram</option>
                          <option value="facebook">Facebook</option>
                          <option value="twitter">Twitter</option>
                          <option value="pinterest">Pinterest</option>
                          <option value="tiktok">Tiktok</option>
                          <option value="tinder">Tinder</option>
                          <option value="outros">Outros</option>

                      </select>
                    </div>
                  </div>

                  <div class="row">



        <div class="col mb-3">
          <label for="nameBasic" class="form-label">username</label>
          <input type="text" required name="username" class="form-control"  />
        </div>
        </div>
                

                <div class="row">

                    <input type="hidden" required name="person_id" value="<?= $p['id'] ?>" class="form-control"  />


                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label">url</label>
                      <input type="text" required name="url" class="form-control"  />
                    </div>
                  </div>

                  <div class="row">



                  <div class="col mb-3">
                    <label for="nameBasic" class="form-label">intensividade</label>
                    <input type="text" required name="intensividade" class="form-control"  />
                  </div>
                  </div>
                            

                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label">validado</label>
                      <select class="form-select" name="status">
                          <option value="0">Acessivel</option>
                          <option value="1">Sem acesso</option>

                      </select>
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

        <!-- Modal -->
        <div class="modal fade" id="modalAdicioniarClassificacao" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Nova Tags</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">

                              <form id="form-add-classificacao" >
                          
                                  <div class="row">
                                    <div class="col mb-3">

                                    <input type="hidden" required name="person_id" value="<?= $p['id'] ?>" class="form-control"  />


                                      <labelfor="nameBasic" class="form-label">Categoria</label>
                                      
                                      <select  onchange="get_sub(this.value, 'add')" id="classificacao_cat_id" name="categoria_id" class="form-select"  >
                                      <option selected value="">Selecionar</option>

                                        <?php foreach ($this->admin_model->get_categorias() as $c) { ?>
                                            <option value="<?= $c->id ?>"><?= $c->nome ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameBasic" class="form-label">Subcategoria</label>
                                      
                                      <select onchange="get_tag(this.value, 'add')" name="subcategoria_id" id="add_subcategoria_id" class="form-select"  >
                                       
                                      </select>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameBasic" class="form-label">Tags</label>
                                      
                                      <select  name="tag_id" id="add_tag_id" class="form-select"  >
                                       
                                      </select>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <labelfor="nameBasic" class="form-label">Intensividade</label>
                                      
                                      <select name="intensividade_id" class="form-select"  >
                                      <option selected value="">Sem Intensidade</option>

                                        <?php foreach ($this->admin_model->get_intensividade() as $c) { ?>
                                            <option value="<?= $c->id ?>"><?= $c->nome ?></option>
                                        <?php } ?>
                                      </select>
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
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <?php $this->load->view('comp/footer'); ?>

    <script>
           $(document).ready(function(e) {
        getCidades(<?= $p['estado'] ?>) 
        
      })
      
    </script>
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

                                  $('#cidade').val(<?= $p['cidade'] ?>)
                              
                          },
                          error: function(data) {
                              alert('Ocorreu um erro temporário.');
                          },
                      });

    }

    
    $('#form-update-pessoa').on('submit', function(e) {
            e.preventDefault()

            var form = $(this).serialize()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>persona/act_update_pessoa',
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
    

    function delete_email(email_id) {

      
 
            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>persona/act_delete_email',
                data: {email_id:email_id},
                success: function(data) {
                    var resp = JSON.parse(data)

                    if (resp.status == "true") {

                        alert('Excluido com sucesso!')
                        location.reload()
                    } else {
                        alert('Erro ao adicionar!')
                    }
                },
                error: function(data) {
                    alert('Ocorreu um erro temporário.');
                },
            });
     

    }

    $('#form-add-email').on('submit', function(e) {
            e.preventDefault()

            var form = $(this).serialize()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>persona/act_add_email',
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


    function delete_telefone(telefone_id) {


      $.ajax({
          method: 'POST',
          url: '<?= base_url() ?>persona/act_delete_telefone',
          data: {telefone_id:telefone_id},
          success: function(data) {
              var resp = JSON.parse(data)

              if (resp.status == "true") {

                  alert('Excluido com sucesso!')
                  location.reload()
              } else {
                  alert('Erro ao adicionar!')
              }
          },
          error: function(data) {
              alert('Ocorreu um erro temporário.');
          },
      });


    }
    

    
    function delete_classificacao(classificacao_id) {


        $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>persona/act_delete_classificacao',
            data: {classificacao_id:classificacao_id},
            success: function(data) {
                var resp = JSON.parse(data)

                if (resp.status == "true") {

                    alert('Excluido com sucesso!')
                    location.reload()
                } else {
                    alert('Erro ao adicionar!')
                }
            },
            error: function(data) {
                alert('Ocorreu um erro temporário.');
            },
        });


    }
    function delete_social(social_id) 
    {


      $.ajax({
          method: 'POST',
          url: '<?= base_url() ?>persona/act_delete_social',
          data: {social_id:social_id},
          success: function(data) {
              var resp = JSON.parse(data)

              if (resp.status == "true") {

                  alert('Excuido com sucesso!')
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

    $('#form-add-telefone').on('submit', function(e) {
        e.preventDefault()

        var form = $(this).serialize()

        $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>persona/act_add_telefone',
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


    $('#form-add-social').on('submit', function(e) {
        e.preventDefault()

        var form = $(this).serialize()

        $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>persona/act_add_social',
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


    function get_sub(categoria_id, dd ) {


        $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>persona/act_get_subcategoria_by_categoria',
            data: {categoria_id:categoria_id},
            success: function(data) {

              if (dd == "update") {
                $('#update_subcategoria_subcategoria_id').html("")
                $('#update_subcategoria_subcategoria_id').html(data)
              } else {
                $('#add_subcategoria_id').html("")
                $('#add_subcategoria_id').html(data)
                
              }

            

                
            },
            error: function(data) {
                alert('Ocorreu um erro temporário.');
            },
        });

    } 


    function get_tag(subcategoria_id) {


      $.ajax({
          method: 'POST',
          url: '<?= base_url() ?>persona/act_get_tag_by_subcategoria',
          data: {subcategoria_id:subcategoria_id},
          success: function(data) {

                $('#add_tag_id').html("")
                $('#add_tag_id').html(data)
   
          },
          error: function(data) {
              alert('Ocorreu um erro temporário.');
          },
      });

    } 
    
    
    $('#form-add-classificacao').on('submit', function(e) {
        e.preventDefault()

        var form = $(this).serialize()

        $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>persona/act_add_classificacao',
            data: form,
            success: function(data) {
                var resp = JSON.parse(data)

                if (resp.status == "true") {

                    alert('Atualizado com sucesso!')
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


    function openClassificar(cat_id) {


      $('#classificacao_cat_id').val(cat_id)

      get_sub(cat_id, 'add')
    }


    function updateIntensidade(person_id, categoria_id, intensidade_id) {

    

      $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>persona/act_add_classificacao_intensidade',
            data: {person_id:person_id, categoria_id:categoria_id, intensidade_id: intensidade_id},
            success: function(data) {
                var resp = JSON.parse(data)

                if (resp.status == "true") {

                    alert('Atualizado com sucesso!')
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

  </body>
</html>