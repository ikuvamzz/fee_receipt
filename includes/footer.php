<br>
<div class="footer">
    <table border="0">
        <tr>
            <td align="center"><u>Developed by:</u></td>
            <td align="center"><u>Call / WhatsApp:</u></td>
            <td align="center"><u>Email Address:</u></td>
        </tr>
        <tr>
            <th ><a href="https://dutttechofficial.wordpress.com/" target="_blank"><p>Sourav Dutt &copy; 2019</p></a></th>
            <th ><a href="tel:+917355012139"><p>+91 73550 12139</p></a></th>
            <th ><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=sdutt12139@gmail.com" target="_blank"><p>sdutt12139@gmail.com</p></a></th>
        </tr>
    </table>
    
    <script>
        $(document).ready(function(){
           $(window).scroll(function(){
              if($(window).scrollTop() + $(window).height() > $(document).height()){
                  $('.footer').slideDown();
              }
//              else if($(window).scrollTop() < 20) {
//                  $('.footer').slideUp();
//              }
              else{
                  $('.footer').slideUp();
              }
           });
           $("input[type=number]").blur(function(){
                var value = $(this).val();
                if(value == ""){
                    $(this).val(0);
                }
           });
           $("input[type=submit]").click(function(){
                var value = $("input[type=number]").val();
                if(value == ""){
                    $("input[type=number]").val(0);
                }
           });
           $("button").click(function(){
                var value = $("input[type=number]").val();
                if(value == ""){
                    $("input[type=number]").val(0);
                }
           });
        });
    </script>
<!--
    <p>
        Developed by : Sourav Dutt &copy; 2019<br>
        Contact Number : <a href="tel:+917355012139">+91 73550 12139</a><br>
        Email : <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=sdutt12139@gmail.com" target="_blank">sdutt12139@gmail.com</a>
    </p>
-->
</div>
</body>
</html>