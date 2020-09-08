<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Restaurant Menu</title>
</head>
<body>
<div class="rel">



      <div id="title">
         <h1>Restaurant</h1>
      </div>

<select id="sel">
        <option value="">MENU Options</option>
    </select>
   
    <table id="table" class="table table-hover">
            <tr>
              <th>Name</th>
              <td id="menuname"></td>
            </tr>
            <tr>
              <th>ID</th>
              <td id="id"></td>
            </tr>
            <tr>
              <th>Short Name</th>
              <td id="sname"></td>
            </tr>
            <tr>
              <th>Description</th>
              <td id="descp"></td>
            </tr>
            <tr>
              <th>Price Small</th>
              <td id="psmall"></td>
            </tr>
            <tr>
              <th>Price Large</th>
              <td id="plarge"></td>
            </tr>
            <tr>
              <th>Small Portion Name</th>
              <td id="spname"></td>
            </tr>
            <tr>
              <th>Large Portion Name</th>
              <td id="lpname"></td>
            </tr>
          </table>
    
      
   
   </div>
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        let base_url = "student.php";

        $("document").ready(function(){
            getMenuNameList();
            document.querySelector("#sel").addEventListener("change",getMenuById);
         });

        function getMenuNameList() {
            let url = base_url + "?req=name_list";
            $.get(url,function(data,success){
        
        for (const item in data) {
               
                let opt=document.createElement("option");
                opt.textContent=data[item].name;
                opt.value=data[item].id;
                document.querySelector('#sel').appendChild(opt);
    
            }
    });
}
    

            function getMenuById(i) {
                let index=i.target.value;
                
            let url = base_url + "?req=menu_data&id="+index;
            $.get(url,function(data,success){
                let x = data;
                document.querySelector("#menuname").textContent = x.name;
                        document.querySelector("#id").textContent = x.id;
                        document.querySelector("#sname").textContent = x.short_name;
                        document.querySelector("#descp").textContent = x.description;
                        document.querySelector("#psmall").textContent = x.price_small;
                        document.querySelector("#plarge").textContent = x.price_large;
                        document.querySelector("#spname").textContent = x.small_portion_name;
                        document.querySelector("#lpname").textContent = x.large_portion_name;
                      
            });
        }
    
    </script>
</body>
</html>