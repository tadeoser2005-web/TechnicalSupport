import './App.css'
import BarraNavegacion from "./componentes/BarraNavegacion.jsx";
import Tarjetas from './componentes/Tarjetas.jsx';
import Encabezado from "./componentes/Encabezado.jsx";


export default function App() {

const tarjetas = [
  {id: 1, img: "", categoria: "Playa", nombre: "Cancun", ubicacion: "México", precio: "$400"},
  {id: 2, img: "", categoria: "Playa", nombre: "Cancun", ubicacion: "México", precio: "$400"},
  {id: 3, img: "", categoria: "Playa", nombre: "Cancun", ubicacion: "México", precio: "$400"},
]

return (
  <div>
    <BarraNavegacion/>
      <div>
          <Encabezado/>
      </div>
    <div>
    {tarjetas.map((t)=> (
      <Tarjetas
      key={t.id}
      nombre={t.nombre}
      ubicacion={t.ubicacion}
      precio={t.precio}
      />
    ))}
    </div>
    </div>

)
}