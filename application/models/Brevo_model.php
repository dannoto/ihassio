

<?php


require './vendor/autoload.php';




class brevo_model extends CI_Model
{

    public function __construct()
    {

        parent::__construct();
    }


    public function importContatos($lista_id, $json_data) {



        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.brevo.com/v3//contacts/import',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
          "fileBody": "'.$json_data.'",
          "listIds": ['.$lista_id.'],
          "emailBlacklist": false,
          "smsBlacklist": false,
          "updateExistingContacts": true,
          "emptyContactsAttributes": true
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Accept: application/json',
            'api-key: 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',
            'Cookie: __cf_bm=8_U5BMJQKq5DX19tJSTGvQ9bQae.0xO3Jrm7w53YPmI-1703351408-1-AQQlcdYSrjGDmTWDqyOhNNixRn8paTKiauuKhrWFJEcVIIgzdWcARkVgrrOyXPR66ik1QchIx3D3dFgXSmmPO8o='
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return get_object_vars(json_decode($response));

        

    }

    public function getCampanhasReport($campanha_id)  {

      $curl = curl_init();
        
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.brevo.com/v3/emailCampaigns/'.$campanha_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
          'Accept: application/json',
          'api-key: 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',
          'Cookie: __cf_bm=FfyiTK_OT.tkuAIMzs39kk6ci6JgEBD41n0D6xlo5e4-1703271828-1-ATmeFdmW5e8u0C8JKL3raY+Hb168VhoC22rxV8kgdogpVBKrQ+aWk08Y5B+feVTv/wVC2zj2IR4qmyWLSy66KKo='
        ),
      ));
      
      $response = curl_exec($curl);
      
      curl_close($curl);
      return get_object_vars(json_decode($response));

    }

    public function getCampanhas() {

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.brevo.com/v3//emailCampaigns?type=classic&status=sent&startDate=2023-01-01T00%3A00%3A00&endDate=2023-12-22T00%3A00%3A00&limit=50&offset=0&sort=desc',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'api-key: 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',
            'Cookie: __cf_bm=FfyiTK_OT.tkuAIMzs39kk6ci6JgEBD41n0D6xlo5e4-1703271828-1-ATmeFdmW5e8u0C8JKL3raY+Hb168VhoC22rxV8kgdogpVBKrQ+aWk08Y5B+feVTv/wVC2zj2IR4qmyWLSy66KKo='
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return get_object_vars(json_decode($response));
    }

    public function createList($nome)
    {
       
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.brevo.com/v3//contacts/lists',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "folderId": 12,
        "name": "'.$nome.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Accept: application/json',
            'api-key: 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',
            'Cookie: __cf_bm=zCfx5Cpxn6MbsNHqGWqP.Fi5IBoXhmVrBuMhE0Q7VJs-1703273654-1-ASfF47qv/BbChAuYGT9zjbN4y2CLVeafv+jNdfFk8vZCqF3INdE4WtYLysLSmZtgZCGdcpdg6v0jT6raFdnENNY='
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return get_object_vars(json_decode($response));
        
       

    }

        
        
       
        
       
        
        
}