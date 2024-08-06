import { fetchLatestVideo } from "./modules/fetchVideo.js";
import { initModal } from "./modules/imageModal.js";


document.addEventListener("DOMContentLoaded", () => {
  fetchLatestVideo().then(() => {});
  initModal();
});
