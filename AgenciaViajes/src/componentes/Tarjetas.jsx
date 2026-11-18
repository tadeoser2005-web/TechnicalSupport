
export default function Tarjetas({imagen, nombre, ubicacion, precio, categoria}){
 return(

<article>

    <img className="" src="" alt=""/>
    <div className="Tarjeta_cuerpo">
    <span className="categoria">{categoria}</span>
    <h2 className="Titulo_tarjeta">{nombre}</h2>
    <p className="ubicacion">{ubicacion}</p>
    <p className="precio">{precio}</p>
    <div className="botones_tarjeta">
    <button className="btn_favorito">
        Añadir a favoritos
    </button>

    <button className="btn_detalles">
        Ver detalles 
    </button>

    </div>

    </div>

</article>

);


}