<?php
class Application {
   
    protected $controller = "HomeController";
    protected $action = "IndexAction";
    protected $parameters = array();

    public function __construct(){
     
        $this->ParseURL();
        // Eğer Controller dosyası varsa dosyayı dahil et.
        if(file_exists(CONTROLLER.$this->controller."php")){
            
            require_once (CONTROLLER.$this->controller."php");
            // Dahil edilen Controller sınıfından yeni bir Controller oluştur.
            $this->controller = new $this->controller;
            // Oluşturulan Controller içerisinde Action varsa Action çağır.
            if(method_exists($this->controller, $this->action)){
                call_user_func_array([$this->controller, $this->action], $this->parameters);
            } else {
                echo "Böyle Bir Action Yok.";
            }
        } else {
            echo "Böyle Bir Controller Yok.";
            
        }
    }

    /**
     * ParseURL methodu genel mantığı ile şu işlemleri yapar;
     * 
     * $_SERVER["REQUEST_URI"] yardımı ile istemci tarafından gönderilen URL yakalanır.
     * 
     * trim() fonkisyonu ile URL sonunda bulunursa "/" karakteri temizlenir.
     * 
     * explode() fonksiyonu ile URL "/" karakterine göre dizileştirilir.
     * 
     * $url değişkeni bir dizi olur. [0] => Controller Adı, [1] => Action Adı, [2} ve Sonrası => Parametreler
     * 
     * unset() fonksiyonu ile $url değişkeninde varsa [0] ve [1] indis numaralı elemenlar temizlenir. 
     * Geriye kalan değerler parametrelerdir.
     */
    
    protected function ParseURL(){
        $request = trim($_SERVER["REQUEST_URI"], "/");
        if (!empty($request)){
            $url = explode("/", $request);
            $this->controller = isset($url[0]) ? $url[0]."Controller" : "HomeController";
            $this->action = isset($url[1]) ? $url[1]."Action" : "IndexAction";
            unset($url[0], $url[1]);
            $this->parameters = !empty($url) ? array_values($url) : array();
        } else {
            $this->controller = "HomeController";
            $this->action = "IndexAction";
            $this->parameters = array();
        }
    }
}
?>