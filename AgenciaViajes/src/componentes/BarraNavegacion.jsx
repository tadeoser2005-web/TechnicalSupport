import avionImg from '../assets/Airplane.png';
export default function BarraNavegacion() {
    return (
       <section className='navegacion'>
           <div className='imagenTitulo'>
           <img src={avionImg} alt='Logo TravelApp' />
           <strong>TravelAPP</strong>
           </div>
           <div className='opciones'>
           <p>Inicio</p>
           <p>Destinos</p>
           <p>Favoritos</p>
           </div>
       </section>
    )
}