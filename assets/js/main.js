document.addEventListener('DOMContentLoaded', () => {

  const openBtn = document.getElementById("openModal");

  const overlay = document.getElementById("modalOverlay");
  const content = document.getElementById("modalContent");
  const closeBtn = document.getElementById("closeModal");
  openBtn.addEventListener("click", () => {
    overlay.style.display = "flex";

    fetch("modal-content.php")
      .then(response => response.text())
      .then(html => {
        content.innerHTML = html;
      })
      .catch(() => {
        content.innerHTML = "Ошибка загрузки данных.";
      });
  });

  document.addEventListener('click', function (event) {
    if (event.target.classList.contains('modal-close')) {
      const overlay = document.getElementById('modalOverlay');
      if (overlay) {
        overlay.style.display = 'none';
      }
    }
  });

  overlay.addEventListener("click", (e) => {
    if (e.target === overlay) {
      overlay.style.display = "none";
    }
  });

  const burger = document.getElementById('burger');
  const navMenu = document.getElementById('navMenu');

  if (burger && navMenu) {
    burger.addEventListener('click', () => {
      navMenu.classList.toggle('active');
    });
  }
});

function toggleForms() {
  const login = document.getElementById('login-form');
  const register = document.getElementById('register-form');
  login.style.display = login.style.display === 'none' ? 'block' : 'none';
  register.style.display = register.style.display === 'none' ? 'block' : 'none';
}

function validateRegister() {
  const phone = document.querySelector('input[name="phone"]').value;
  const terms = document.querySelector('input[name="terms"]').checked;

 

  if (!terms) {
    alert('Необходимо согласиться с условиями');
    return false;
  }

  return true;
}



