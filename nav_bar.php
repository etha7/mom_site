<table align="bottom">
  <tbody><tr>
   <td>
    
    <div class="nav fadeIn">
        <div class="container">
                <ul>
                    <li class="btn fadeIn"><a href="index.php"><span>HOME</span></a></li><!--                        
                 --><li class="btn fadeIn"><a href="about.php"><span>ABOUT</span></a></li><!--
                 --><li class="btn fadeIn"><a href="contact.php"><span>CONTACT</span></a></li><!-- 			
                 --><li class="btn fadeIn"><a href="login.php"><span>LOGIN</span></a></li><!-- 
                 --><li class="btn fadeIn"><a href="register.php"><span>REGISTER</span></a></li> 
                </ul>
             </div>
         </div>
    </td>
   </tr>
</tbody></table>
<script>
fontsize = function (){
    var container = document.getElementsByClassName('btn fadeIn');
    var i;
    
    for(i = 0; i < container.length; i++)
    {
       var height = container[i].offsetHeight;
       var fontS = height*0.1 +"px";
       container[i].style.fontSize = fontS;
    }
};
window.addEventListener('resize',  fontsize);
window.addEventListener('load',  fontsize);
</script>

