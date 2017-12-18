<!DOCTYPE html>
    <html lang="es">
        <head>
             <title></title>
                <meta charset="UTF-8">
                <meta name="description" content="contenido de plantilla" />
                <meta name="author" content="Ludwin Hernández">
                <script src="js/jquery-3.2.1.min.js"></script>
        </head>

        <body>
            <table id="tabla">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Nota1</th>
                <th>Nota2</th>
                <th>Select</th>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Juan</td>
                    <td><input type="text" id="nota1" value=""></td>
                    <td><input type="text" id="nota2" value=""></td>
                     <td>
                        <select id="elegido">
                            <option value="1">1</option>
                            <option value="15">15</option>
                            <option value="202">202</option>
                        </select>
                     </td>


                </tr>
                <tr>
                    <td>002</td>
                    <td>Pedro</td>
                     <td><input type="text" id="nota1" value=""></td>
                    <td><input type="text" id="nota2" value=""></td>
                    <td>
                         <select id="elegido">
                            <option value="1">1</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>
                     </td>

                </tr>
                <tr>
                    <td>003</td>
                    <td>Lorent</td>
                     <td><input type="text" id="nota1" value=""></td>
                    <td><input type="text" id="nota2" value=""></td>
                    <td>
                         <select id="elegido">
                            <option value="3">3</option>
                            <option value="100">100</option>
                            <option value="2">2</option>
                        </select>
                     </td>

                </tr>
                <tr>
                    <td>004</td>
                    <td>Alonso</td>
                     <td><input type="text" id="nota1" value=""></td>
                    <td><input type="text" id="nota2" value=""></td>
                    <td>
                          <select id="elegido">
                            <option value="2">2</option>
                            <option value="30">30</option>
                            <option value="11">11</option>
                        </select>
                     </td>

                </tr>

            </tbody>
            </table>
         
            <button>Guardar</button>
            <script type="text/javascript">
$(document).ready(function(){
    $("button").click(function () 
    {
        var  StringDatos="";
        var i=0;
        $("#tabla tbody tr").each(function (index) 
        {
            var campo1, campo2, campo3;

            $(this).children("td").each(function (index2) 
            {
                switch (index2) 
                {
                    case 0: campo1 = $(this).text();
                            break;
                    case 1: campo2 = $(this).text();
                            break;
                    case 2: campo3= $(this).find("#nota1").val();
                            break;
                    case 3: campo4= $(this).find("#nota2").val();
                            break;
                    case 4: campo5= $(this).find("select#elegido option:selected").val(); 
                            break;
                }
                $(this).css("background-color", "#ECF8E0");
            })
          
            StringDatos+=campo1+"|"+campo2+"|"+campo3+"|"+campo4+"|"+campo5+"#";
            i=i+1;
           

        })
        var dataString='stringdatos='+StringDatos+'&cuantos='+i;
         alert(dataString);
          $.ajax({
                    type:'POST',
                    url:'notas.php',
                    data: dataString,           
                    dataType: 'json',
                    success: function(datax){   
                        //process=datax.process;
                        var msg=datax.msg;
                        if(msg=="OK")
                        {   
                            alert('Exito');
                        }
                        if(msg=="NO")
                        {
                            alert('Error');
                        }

                         
                    }
                }); 
    })
})

</script>
        </body>
    </html>