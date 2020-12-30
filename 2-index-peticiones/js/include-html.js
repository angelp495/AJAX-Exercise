document.addEventListener("DOMContentLoaded", (e) => {
  const includeHTML = async (el, url) => {
    try {
      let res = await axios.get(url);
      //Guardando recursos efectivos en $main.
      el.outerHTML = res.data;
    } catch (err) {
      //Solicitud de recursos no exitosa.
      el.outerHTML = err;
    }
  };

  document
    .querySelectorAll("[data-include]")
    .forEach((el) => includeHTML(el, el.getAttribute("data-include")));
});
