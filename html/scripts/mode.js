function setModePreference() {
    const userPreference = localStorage.getItem('mode');
    if (userPreference === 'light-mode') {
      document.body.classList.remove('accent-warning');
      document.body.classList.remove('dark-mode');
      document.body.classList.add('light-mode');
      document.querySelector('nav').classList.remove('navbar-dark');
      document.querySelector('nav').classList.add('navbar-light');
    } else {
      document.body.classList.remove('light-mode');
      document.body.classList.add('dark-mode');
      document.body.classList.add('accent-warning');
      document.querySelector('nav').classList.remove('navbar-light');
      document.querySelector('nav').classList.add('navbar-dark');
      // Set the mode preference in localStorage
      localStorage.setItem('mode', 'dark-mode');
    }
  }
  
  function toggleMode() {
    const body = document.body;
    const nav = document.querySelector('nav');
  
    if (body.classList.contains('dark-mode')) {
      body.classList.remove('accent-warning');
      body.classList.remove('dark-mode');
      body.classList.add('light-mode');
      nav.classList.remove('navbar-dark');
      nav.classList.add('navbar-light');
  
      localStorage.setItem('mode', 'light-mode');
    } else {
      body.classList.remove('light-mode');
      body.classList.add('dark-mode');
      body.classList.add('accent-warning');  
      nav.classList.remove('navbar-light');
      nav.classList.add('navbar-dark');
  
      localStorage.setItem('mode', 'dark-mode');
    }
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('toggle-mode');
    
    toggleButton.addEventListener('click', function() {
      toggleMode();
    });
  
    setModePreference();
  });

 //language memory
  function setLanguagePreference() {
    const userPreference = localStorage.getItem('language');
    const languageSelect = document.getElementById('languageSelect');
  
    if (userPreference) {
      languageSelect.value = userPreference;
    } else {
      // Set the default language preference in localStorage
      localStorage.setItem('language', languageSelect.value);
    }
  }
  
  function handleLanguageChange() {
    const languageSelect = document.getElementById('languageSelect');
    const selectedLanguage = languageSelect.value;
  
    // Update the language preference in localStorage
    localStorage.setItem('language', selectedLanguage);
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    const languageSelect = document.getElementById('languageSelect');
  
    languageSelect.addEventListener('change', function() {
      handleLanguageChange();
    });
  
    setLanguagePreference();
  });
  
  