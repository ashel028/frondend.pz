
function copy() {
    alert ("autor:Axel Goñi - goniaxe@gmail.com")
}

const modoNocheBtn = document.getElementById('modoNocheBtn');

modoNocheBtn.addEventListener('click', function()
{
  document.body.classList.toggle('modo-noche');
  modoNocheBtn.classList.toggle('active');
}
  );
