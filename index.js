import { fetchLatestVideo } from "./modules/fetchVideo.js";
import { initModal } from "./modules/imageModal.js";
import { openWp } from "./modules/openWhatsapp.js";
import { translate } from "./modules/translate.js";


document.addEventListener("DOMContentLoaded", () => {
  fetchLatestVideo().then(() => {});

  openWp();

  initModal();

  translate();
});
