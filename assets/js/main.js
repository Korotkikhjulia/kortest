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

      // Удаление параметра error=1 из URL
      const url = new URL(window.location);
      url.searchParams.delete('error');
      window.history.replaceState({}, document.title, url.pathname + url.search);
    }
  });

  overlay.addEventListener("click", (e) => {
    if (e.target === overlay) {
      overlay.style.display = "none";

      // Также удалим ?error=1 если закрытие по фону
      const url = new URL(window.location);
      url.searchParams.delete('error');
      window.history.replaceState({}, document.title, url.pathname + url.search);
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

function validateForm(formId, rules) {
  const form = document.querySelector(formId);
  let isValid = true;

  for (const field of rules.fields) {
    const input = form.querySelector(`input[name="${field.name}"]`);
    const icon = form.querySelector(`.${field.iconClass}`);

    if (!input) continue;

    input.classList.remove('input-error');
    if (icon) icon.style.display = 'none';

    if (!input.value.trim()) {
      input.classList.add('input-error');
      if (icon) icon.style.display = 'inline';
      isValid = false;
    }
  }

  if (rules.checkbox) {
    const checkbox = form.querySelector(`input[name="${rules.checkbox.name}"]`);
    const label = checkbox?.closest(".custom-checkbox2");
    const checkmark = label?.querySelector(".checkmark2");

    label?.classList.remove("checkbox-error");
    checkmark?.classList.remove("checkmark-error");

    if (checkbox && !checkbox.checked) {
      label?.classList.add("checkbox-error");
      checkmark?.classList.add("checkmark-error");
      isValid = false;
    }
  }

  return isValid;
}

function validateLogin() {
  return validateForm('#loginForm', {
    fields: [
      { name: 'username', iconClass: 'username-icon' },
      { name: 'password', iconClass: 'password-icon' }
    ]
  });
}

function validateRegister() {
  return validateForm('#regForm', {
    fields: [
      { name: 'username', iconClass: 'username-icon' },
      { name: 'password', iconClass: 'password-icon' },
      { name: 'user', iconClass: 'user-icon' },
      { name: 'phone', iconClass: 'phone-icon' }
    ],
    checkbox: { name: 'terms' }
  });
}


window.addEventListener('DOMContentLoaded', () => {
  const params = new URLSearchParams(window.location.search);

  const overlay = document.getElementById("modalOverlay");
  const content = document.getElementById("modalContent");

  if (params.get('error') === '1' || params.get('error') === '2') {
    overlay.style.display = "flex";

    fetch("modal-content.php")
      .then(response => response.text())
      .then(html => {
        content.innerHTML = html;

        // Подождем пока html вставится, затем работаем с его элементами
        if (params.get('error') === '1') {
          const form = content.querySelector('#loginForm');
          const usernameInput = form.querySelector('input[name="username"]');
          const passwordInput = form.querySelector('input[name="password"]');
          const usernameIcon = form.querySelector('.username-icon');
          const passwordIcon = form.querySelector('.password-icon');

          // Очистка и показ ошибки
          [usernameInput, passwordInput].forEach(input => input.classList.remove('input-error'));
          [usernameIcon, passwordIcon].forEach(el => el.style.display = 'none');

          usernameInput.classList.add('input-error');
          usernameIcon.style.display = 'inline';

          passwordInput.classList.add('input-error');
          passwordIcon.style.display = 'inline';
        }

        if (params.get('error') === '2') {
          const login = content.querySelector('#login-form');
          const register = content.querySelector('#register-form');
        
          if (login && register) {
            login.style.display = 'none';
            register.style.display = 'block';
          }
        
          const registerForm = content.querySelector('#register-form');
        
          if (registerForm) {
            const usernameInput = registerForm.querySelector('input[name="username"]');
            const passwordInput = registerForm.querySelector('input[name="password"]');
            const userInput = registerForm.querySelector('input[name="user"]');
            const phoneInput = registerForm.querySelector('input[name="phone"]');
            const terms = registerForm.querySelector('input[name="terms"]');
        
            const usernameIcon = registerForm.querySelector('.username-icon');
            const userIcon = registerForm.querySelector('.user-icon');
            const phoneIcon = registerForm.querySelector('.phone-icon');
            const passwordIcon = registerForm.querySelector('.password-icon');
        
            const checkboxLabel = terms?.closest(".custom-checkbox2");
            const checkmark2 = checkboxLabel?.querySelector(".checkmark2");
        
            // Очистка
            [usernameInput, passwordInput, userInput, phoneInput].forEach(el => el?.classList.remove('input-error'));
            [usernameIcon, passwordIcon, userIcon, phoneIcon].forEach(el => el && (el.style.display = 'none'));
        
            // Ошибки
            if (usernameInput) usernameInput.classList.add('input-error');
            if (usernameIcon) usernameIcon.style.display = 'inline';
        
            if (userInput) userInput.classList.add('input-error');
            if (userIcon) userIcon.style.display = 'inline';
        
            if (passwordInput) passwordInput.classList.add('input-error');
            if (passwordIcon) passwordIcon.style.display = 'inline';
        
            if (phoneInput) phoneInput.classList.add('input-error');
            if (phoneIcon) phoneIcon.style.display = 'inline';
        
            if (checkboxLabel && checkmark2) {
              checkboxLabel.classList.add('checkbox-error');
              checkmark2.classList.add('checkmark-error');
            }
          }
        }
        const url = new URL(window.location);
        url.searchParams.delete('error');
        window.history.replaceState({}, document.title, url.pathname + url.search);
      })
      .catch(() => {
        content.innerHTML = "Ошибка загрузки данных.";
      });
  }
});





