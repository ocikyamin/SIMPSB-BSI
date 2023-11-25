let deferredPrompt;

window.addEventListener('beforeinstallprompt', (event) => {
    event.preventDefault();
    deferredPrompt = event;
    const customInstallButton = document.getElementById('btn-install-app');
    customInstallButton.style.display = 'inline';

    customInstallButton.addEventListener('click', () => {
        deferredPrompt.prompt();

        deferredPrompt.userChoice.then((choiceResult) => {
            if (choiceResult.outcome === 'accepted') {
                customInstallButton.style.display = 'none';
                // console.log('Aplikasi diinstal.');
            }
            deferredPrompt = null;
        });
    });
});
