<table align="bottom">
  <tbody><tr>
   <td>
    
    <div class="nav fadeIn">
        <div class="container">
                <ul>
                    <li class="btn fadeIn"><a href="index.php"><span onload="sizeButton()">HOME</span></a></li><!--                        
                 --><li class="btn fadeIn"><a href="about.php"><span onload="sizeButton()">ABOUT</span></a></li><!--
                 --><li class="btn fadeIn"><a href="contact.php"><span onload="sizeButton()">CONTACT</span></a></li><!-- 			
                 --><li class="btn fadeIn"><a href="login.php"><span onload="sizeButton()">LOGIN</span></a></li><!-- 
                 --><li class="btn fadeIn"><a href="register.php"><span onload="sizeButton()">REGISTER</span></a></li> 
                </ul>
             </div>
         </div>
    </td>
   </tr>
</tbody></table>
<script>
function sizeButton() {
        var currSize = document.getElementByClass("btn");
        document.getElementByTagName("span").style.fontSize = currSize;
}
</script>
