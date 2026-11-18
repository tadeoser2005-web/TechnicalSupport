import './App.css'
import BarraNavegacion from "./componentes/BarraNavegacion.jsx";
import Tarjetas from './componentes/Tarjetas.jsx';
import Encabezado from "./componentes/Encabezado.jsx";
import cancun from "./assets/cancun.jpg";
import inglaterra from "./assets/inglaterra.jpg";
import japon from "./assets/Japon.jpg";

export default function App() {

const tarjetas = [
  {id: 1, imagen: cancun, categoria: "Playa", nombre: "Cancún", ubicacion: "📍México", precio: " Desde: $400 MXN"},
  {id: 2, imagen: inglaterra, categoria: "Cultura", nombre: "Sakura", ubicacion: "📍Japon", precio: "Desde: $6000 MXN"},
  {id: 3, imagen: japon, categoria: "Cultura", nombre: "Londres", ubicacion: "📍Inglaterra", precio: "Desde: $9000 MXN"},
]

return (
  <div>
    <BarraNavegacion/>
      <div>
          <Encabezado/>
      </div>
      <div className='buscar'>
      <strong>Explorar destinos</strong>
          <input
                type='text'
                name='buscador'
                id='buscador'
                placeholder='Buscar destino turistico...'
          />
          <button>Mostrar favoritos</button>
      </div>
    <div className='Tarjeta_cuerpo'>
    {tarjetas.map((t)=> (
      <Tarjetas
      key={t.id}
      imagen={t.imagen}
      nombre={t.nombre}
      categoria={t.categoria}
      ubicacion={t.ubicacion}
      precio={t.precio}
      />
    ))}
    </div>
    </div>

)
}