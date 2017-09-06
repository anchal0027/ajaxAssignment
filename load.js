var current=1;
            function change_slide(page)
              {
                current=page;
                user(page);
                
                
              }
              
           $(document).ready(function()
              {        
                user(1);
             }); 
            function user(page){
            var data1 = ""
            var total_rows=""

          
            $.ajax({ 
                type: "POST",
                data:{ "page": page},
                url: "fetch.php",             
                dataType: "html",
                success: function(rows) {
            
                //console.log(">>>>>>>>>>..rows are",rows);  
                rows = JSON.parse(rows)
                //console.log(rows); 
                total_rows=rows.data;

              
                table(total_rows);
                //console.log(">>>>>>>>>>>>count",rows.count)
                total_buttons=rows.count/5;
                if(!(total_buttons%5==0)){
                total_buttons=total_buttons+1;
              }
                button(total_buttons);
                   },

             // complete: function()   {
             // setTimeout(function()  {
             // user(current);
             //    },4000);
             //       }
               }) 
             }

            function table(total_rows) {
            var data1 = ""                
             data1+= "<table  class='table table-bordered table-striped'>"; 
               data1+=  "<tr>" +
                        "<th>ID</th>" +
                        "<th>Name</th>" +
                        "<th>email</th>" +
                        "<th>message</th>" +
                        "<th>date</th>" +
                        "</tr>"
            for (var i in total_rows)  {

              var row = total_rows[i];
              
            
              data1+=   "<tr>" +
                        "<td>" + row[0] + "</td>" +
                        "<td contenteditable id='anchal'>" + row[1] + "</td>" +
                        "<td contenteditable>" + row[2] + "</td>" +
                        "<td contenteditable>" + row[3] + "</td>" +
                        "<td>" + row[4] + "</td>" +
                        "</tr>";                  
                  }
        
              data1+= "</table>";
                $(".container").html(data1); 
                 }
   
            function button(total_pages){
             
            
            var buttons = "<ul class='pagination' style='margin-left:590px;'>"
            for (var i = 1; i<total_pages; i ++)  {
              if(i==current)
              buttons +=  "<li class='active'><a id= "+i+" onclick= 'change_slide(" +i+ ")' href= '#'>"+i+"</a></li>"
            else
              buttons +=  "<li><a id= "+i+" onclick= 'change_slide(" +i+ ")' href= '#'>"+i+"</a></li>"

                     }
              buttons += "</ul>";
              $(".pagination").html(buttons);
                  }
                  


