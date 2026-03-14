function changeVideoReload(videoName, el) {

    // save selected video
    localStorage.setItem('selectedVideo', videoName);

    // save active theme text
    localStorage.setItem('activeTheme', el.innerText);

    // reload page
    location.reload();
}

window.addEventListener('load', function () {

    const savedVideo = localStorage.getItem('selectedVideo');

    if (savedVideo) {
        const video = document.getElementById('bgVideo');
        const source = video.querySelector('source');

        // base path HTML se milega
        source.src = window.VIDEO_BASE_PATH + savedVideo;
        video.load();
        video.play();
    }

    // restore active class
    const savedTheme = localStorage.getItem('activeTheme');
    if (savedTheme) {
        document.querySelectorAll('.themes li').forEach(li => {
            li.classList.remove('active');
            if (li.innerText.trim() === savedTheme.trim()) {
                li.classList.add('active');
            }
        });
    }
});
