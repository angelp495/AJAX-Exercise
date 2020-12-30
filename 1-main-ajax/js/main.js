const d = document,
  $main = d.querySelector("main");

const getAll = async () => {
  //Solicitando recursos.
  try {
    let res = await axios.get("assets/home.html");
    //Guardando recursos efectivos en $main.
    $main.innerHTML = res.data;
    console.log("¡Exito!");
  } catch (err) {
    //Solicitud de recursos no exitosa.
    console.log(err);
  }
};

//load of home page
d.addEventListener("DOMContentLoaded", getAll);

//change page
d.addEventListener("click", async (e) => {
  if (e.target.matches(".menu a")) {
    //Prevent the default response of a link.
    e.preventDefault();
    //page obtains the value from the atribute href of the target.
    let page = e.target.href;
    try {
      let res = await axios.get(page);
      $main.innerHTML = res.data;
      console.log(res);
    } catch (err) {
      console.log(err);
    }
  }
});
