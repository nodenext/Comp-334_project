function check_all(){
    
  var checkAll = document.getElementById('all');

         var items = document.getElementsByName('ck[]');
    
        for (var item of items){
            item.checked = checkAll.checked ;
        }

    
}