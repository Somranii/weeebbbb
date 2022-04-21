function h(x)
{if (x==0)
document.getElementById('list').style.display='block';
else
document.getElementById('list').style.display='none';
return;
}
function checkpassword(){
    var a=document.getElementById('pass1').value;
    var b=document.getElementById('pass2').value;
    if(a!=b)
  { document.getElementById('message').innerHTML="*password not matching";
return false;}
else {return true;}
}

/* hedhy fonction l popup*/
function show(){
  document.getElementById('pop').classList.add('open');
}
function hide(){
  document.getElementById('pop').classList.remove('open');
}
