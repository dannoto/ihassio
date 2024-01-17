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

    <title>Classificador de Imagens</title>

    <meta name="description" content="" />

    <?php $this->load->view('comp/header'); ?>

  </head>

  <style>
 .c_div_listx {
  list-style-type: none;
 
 }
 .c_item_listx {
  border-bottom: 1px solid #f1f1f1;
  height: 35px;
  top: 13px;
 }
 .c_div_list {
  list-style-type: none;
  border: 1px solid #f1f1f1;
  height: 190px;
  overflow-y: scroll;
 }
 .c_item_list {
  border-bottom: 1px solid #f1f1f1;
  height: 35px;
  top: 13px;
  cursor: pointer;
 }
 .c_container_list {
  height: 50px;
  overflow-y: scroll;
 }

 .tag_item{
  background-color: #03c3ec;
  color:#000;
  border-radius: 5px;
  line-height: 20px;
  padding: 4px;
  margin: 1px 1px 1px 1px;
font-size: 17px; }

.tag_item span {
  font-size: 19px;
}
  </style>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
      <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->


            <div class="container-xxl flex-grow-1 container-p-y">

              <div class="mb-3 mt-1">
                <a href="<?= base_url() ?>persona/editar/<?=$person_id?>">
                <button class="btn btn-outline-info"> <span class="bx bx-left-arrow-alt"></span> VOLTAR    </button>
                </a>
              </div>

           
              <div class="row">
                <!-- Basic Layout -->
                <div class="row">
                  <div class="card mb-8 col-md-7 p-1 ">
                      <div class="row">
                        <div class="col-md-2">
                          
                        <?php if (strlen($previous) > 0 ) {   ?>
                            <a href="<?= base_url() ?>classificador/u/<?=$person_id?>/<?=$previous?>"><span style="font-size: 50px;margin-top:250px" class="bx bx-chevron-left"></span></a>
                         <?php } ?>
                        </div>
                        <div class="col-md-8">
                        <center><small><?=$indice + 1?> / <?=count($arrayFotos)?></small></center>

<?php if ($dados['type'] != "video") { ?>
  <img class="mt-3 mb-5" style="width: 100% ; min-width :100%;max-height:500px;object-fit:contain" src="data:image/jpeg;base64,<?=$dados['imagem']?>" alt="">

              <?php } else { ?>     
                <video  style="width: 100% ; min-width :100%;max-height:500px;object-fit:contain" controls>
                  <source  type="video/mp4" src="data:video/mp4;base64,<?=$dados['imagem']?>" type="">
                </video>     
              <?php } ?>          
         

                        </div>
                        <div class="col-md-2 ">
                          <?php if (strlen($next) > 0 ) {   ?>
                            <a href="<?= base_url() ?>classificador/u/<?=$person_id?>/<?=$next?>"><span style="font-size: 50px;margin-top:250px" class="bx bx-chevron-right"></span></a>
                         <?php } ?>
                        </div>

                      </div>

                  
                 
                  
                  </div>
                  <div class="card mb-4 col-md-5 p-1">
                    <div class="card-header">
                      <div class="mb-3  d-flex align-items-end justify-content-end">
                       
                        <div>
                        <a target="_bank" href="<?=base_url()?>persona/tags">
                        <button class="btn btn-info bx bx-plus"><small> TAG</small></button>

                      </a>
                        </div>
                      </div>

                    <div>
                      <input id="input-seacj" onkeyup="buscaTag(this.value)" type="text" placeholder="Pesquisa por uma tag..." class="form-control">
                    </div>
                    <div>

                    </div class="c_container_list" >
                      <ul class="c_div_list" style="display: none;" id="div_list_tag">

                      </ul>
                    </div>
                    <div class="">
                      
                      <ul class="c_div_listx">
             

                      </ul>
           

                    </div>
                 
                  
                  </div>
                </div>
               
              </div>

              </div>

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
    </div>
    <!-- / Layout wrapper -->

  

    <?php $this->load->view('comp/footer'); ?>

    <script>

      $(document).ready(function(e) {
        tagsByIm() 
      })
           
      function buscaTag(e) {

     
        if (e.length > 0 ) {

          $('#div_list_tag').css('display','block')

          $.ajax({
              method: 'POST',
              url: '<?= base_url() ?>classificador/act_search_tag',
              data: {
                query:e,
                person_id:"<?=$person_id?>",
                imagem_id:"<?=$imagem_id?>"

              },
              success: function(data) {
                  $('#div_list_tag').html("")
                  $('#div_list_tag').html(data)

              },
              error: function(data) {
                  alert('Ocorreu um erro temporário.');
              },
          });
          

        } else {
          $('#div_list_tag').css('display','none')
        }

      }

      function deleteClassificacao(classificacao_id) {
        
        $.ajax({
              method: 'POST',
              url: '<?= base_url() ?>classificador/act_delete_classificacao',
              data: {
                classificacao_id:classificacao_id,

              
              },
              success: function(data) {
                
                tagsByIm();

              },
              error: function(data) {
                  alert('Ocorreu um erro temporário.');
              },
          });
      }

      function tagsByIm() {
        var imagem_id = "<?=$imagem_id?>"
        var person_id = "<?=$person_id?>"

        $.ajax({
              method: 'POST',
              url: '<?= base_url() ?>classificador/act_et_ta_by_imae',
              data: {
                imagem_id:imagem_id,
                person_id:person_id
              
              },
              success: function(data) {
                
                $('.c_div_listx').html("")
            
                $('.c_div_listx').html(data)

              },
              error: function(data) {
                  alert('Ocorreu um erro temporário.');
              },
          });
      }

      function addClassificao(tag_id, person_id,  categoria_id,  subcategoria_id, imagem_id) {


        $.ajax({
              method: 'POST',
              url: '<?= base_url() ?>classificador/act_add_tag',
              data: {
                tag_id:tag_id,

                person_id:person_id,
                categoria_id:categoria_id, 
                subcategoria_id:subcategoria_id,
                imagem_id:imagem_id

              
              },
              success: function(data) {
             
         
                $("#input-seacj").val("")
                $('#div_list_tag').css('display','none')
                tagsByIm();

              },
              error: function(data) {
                  alert('Ocorreu um erro temporário.');
              },
          });
          


      }


    </script>

  </body>
</html>
