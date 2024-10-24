const audioPlayer = document.getElementById("audioPlayer");

// Restore the last position of the audio
window.addEventListener("load", () => {
  const lastTime = localStorage.getItem("audioTime");
  if (lastTime) {
    audioPlayer.currentTime = lastTime;
    audioPlayer.volume = 0.2;
    audioPlayer.play();
  }
});

// Save the current position of the audio when the page is unloaded
window.addEventListener("beforeunload", () => {
  localStorage.setItem("audioTime", audioPlayer.currentTime);
});
