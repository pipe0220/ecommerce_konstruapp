<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Family;
use App\Models\Category;
use App\Models\Subcategory;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $families = [
            'Herramientas' => [
                'Herramientas Manuales' => [
                    'Destornilladores',
                    'Llaves inglesas',
                    'Alicates',
                    'Martillos',
                    'Sierras manuales',
                    'Cintas métricas',
                    'Niveles',
                    'Cúteres',
                    'Limas',
                    'Formones',
                    'Brocas',
                    'Cinceles',
                    'Pinzas',
                    'Espátulas',
                    'Cepillos metálicos',
                ],
                'Herramientas Eléctricas' => [
                    'Taladros',
                    'Sierras circulares',
                    'Lijadoras orbitales',
                    'Amoladoras angulares',
                    'Atornilladores eléctricos',
                    'Fresadoras',
                    'Cepillos eléctricos',
                    'Caladoras',
                    'Pistolas de calor',
                    'Soldadores eléctricos',
                    'Compresores de aire',
                    'Generadores eléctricos',
                    'Pulidoras',
                    'Cortadoras de azulejos',
                ],
                'Herramientas de Jardín' => [
                    'Palas',
                    'Rastrillos',
                    'Tijeras de podar',
                    'Mangueras',
                    'Cortacéspedes',
                    'Desbrozadoras',
                    'Podadoras',
                    'Azadas',
                    'Carretillas',
                    'Pulverizadores',
                    'Hachas',
                    'Regaderas',
                    'Escobas de jardín',
                    'Cultivadores manuales',
                ],
                'Herramientas de Medición' => [
                    'Calibres',
                    'Escuadras',
                    'Micrómetros',
                    'Medidores láser',
                    'Teodolitos',
                    'Clinómetros',
                    'Medidores de humedad',
                ],
            ],
            'Materiales de Construcción' => [
                'Maderas' => [
                    'Tablones de pino',
                    'Planchas de MDF',
                    'Listones de roble',
                    'Madera contrachapada',
                    'Tableros aglomerados',
                    'Maderas tratadas',
                    'Tablas de cedro',
                    'Vigas de construcción',
                ],
                'Pinturas y Acabados' => [
                    'Pinturas de interior',
                    'Pinturas de exterior',
                    'Barnices',
                    'Rodillos y brochas',
                    'Esmaltes',
                    'Imprimaciones',
                    'Disolventes',
                    'Masillas',
                    'Pintura en spray',
                    'Decapantes',
                    'Protectores de madera',
                ],
                'Materiales Básicos' => [
                    'Cemento Portland',
                    'Arena fina',
                    'Grava',
                    'Ladrillos caravista',
                    'Yeso en polvo',
                    'Mortero seco',
                    'Bloques de hormigón',
                    'Cal hidratada',
                    'Piedra natural',
                    'Mallas de refuerzo',
                ],
                'Aislantes' => [
                    'Lana de vidrio',
                    'Poliestireno expandido',
                    'Espuma de poliuretano',
                    'Fibra de celulosa',
                    'Corcho natural',
                ],
            ],
            'Plomería' => [
                'Tuberías y Conexiones' => [
                    'Tuberías PVC',
                    'Tuberías de cobre',
                    'Codos PVC',
                    'Uniones de cobre',
                    'Tuberías de polietileno',
                    'Válvulas de bola',
                    'Manguitos de unión',
                    'Reducciones',
                    'Tubos flexibles',
                    'Juntas de goma',
                ],
                'Grifería' => [
                    'Grifos monomando de cocina',
                    'Grifos termostáticos de baño',
                    'Duchas de mano',
                    'Cabezales de ducha',
                    'Grifos de jardín',
                    'Llaves de paso',
                ],
                'Accesorios de Baño' => [
                    'Inodoros de tanque bajo',
                    'Lavabos de pedestal',
                    'Bañeras acrílicas',
                    'Platos de ducha',
                    'Bidés',
                    'Mamparas de ducha',
                    'Espejos de baño',
                ],
                'Desagües y Sifones' => [
                    'Sifones botella',
                    'Desagües de suelo',
                    'Canaletas de ducha',
                    'Rejillas de ventilación',
                    'Sumideros',
                ],
            ],
            'Electricidad' => [
                'Cables y Conductores' => [
                    'Cables eléctricos 1.5mm',
                    'Alambres de cobre',
                    'Extensiones eléctricas',
                    'Cable coaxial',
                    'Cable de red Cat6',
                    'Mangueras corrugadas',
                ],
                'Iluminación' => [
                    'Bombillas LED E27',
                    'Lámparas de techo',
                    'Focos empotrables',
                    'Tiras LED',
                    'Lámparas de pie',
                    'Apliques de pared',
                    'Luces de emergencia',
                ],
                'Componentes Eléctricos' => [
                    'Interruptores simples',
                    'Enchufes Schuko',
                    'Cajas de distribución',
                    'Diferenciales',
                    'Magnetotérmicos',
                    'Timbre eléctrico',
                    'Portalámparas',
                    'Regletas de conexión',
                ],
                'Domótica' => [
                    'Termostatos inteligentes',
                    'Enchufes wifi',
                    'Sensores de movimiento',
                    'Cámaras IP',
                    'Controladores de persianas',
                ],
            ],
            'Seguridad' => [
                'Cerrajería' => [
                    'Cerraduras de embutir',
                    'Candados de latón',
                    'Llaves vírgenes',
                    'Cerrojos de seguridad',
                    'Pomos de puerta',
                    'Cilindros de cerradura',
                ],
                'Equipos de Protección' => [
                    'Cascos de obra',
                    'Guantes de trabajo',
                    'Gafas de seguridad',
                    'Botas de seguridad',
                    'Chalecos reflectantes',
                    'Mascarillas antipolvo',
                    'Arneses de seguridad',
                ],
                'Sistemas de Alarma' => [
                    'Detectores de humo',
                    'Cámaras de seguridad CCTV',
                    'Sensores de movimiento PIR',
                    'Alarmas antirrobo',
                    'Timbres con cámara',
                    'Cajas fuertes',
                ],
                'Señalización' => [
                    'Señales de salida',
                    'Carteles de peligro',
                    'Cintas de balizamiento',
                    'Conos de tráfico',
                    'Pintura reflectante',
                ],
            ],
            'Fijaciones y Adhesivos' => [
                'Tornillos y Clavos' => [
                    'Tornillos para madera',
                    'Tornillos autorroscantes',
                    'Clavos de acero',
                    'Pernos de anclaje',
                    'Remaches',
                    'Tirafondos',
                    'Tachuelas',
                ],
                'Adhesivos' => [
                    'Pegamento para madera',
                    'Silicona neutra',
                    'Cinta de doble cara',
                    'Epoxy bicomponente',
                    'Adhesivo de montaje',
                    'Cola blanca',
                    'Masilla epoxi',
                ],
                'Soportes y Anclajes' => [
                    'Ménsulas metálicas',
                    'Escuadras reforzadas',
                    'Tacos de expansión',
                    'Abrazaderas para tubos',
                    'Colgadores de cuadros',
                    'Tensores de cable',
                ],
            ],
            'Maquinaria y Equipos' => [
                'Equipos de Elevación' => [
                    'Polipastos manuales',
                    'Gatos hidráulicos',
                    'Eslingas',
                    'Grúas de taller',
                    'Elevadores de tijera',
                ],
                'Equipos de Soldadura' => [
                    'Soldadores por arco',
                    'Equipos de soldadura MIG',
                    'Sopletes de gas',
                    'Caretas de soldar',
                    'Electrodos de soldadura',
                ],
                'Limpieza y Mantenimiento' => [
                    'Hidrolavadoras',
                    'Aspiradoras industriales',
                    'Barredoras manuales',
                    'Pulidoras de suelo',
                    'Limpiadores a vapor',
                ],
            ],
        ];

        foreach ($families as $family => $categories){

            $family = Family::create([
                'name'=> $family,
            ]);

            foreach ($categories as $category =>$subcategories){
                $category = Category::create([
                    'name'=> $category,
                    'family_id'=> $family->id,
                ]);

                foreach ($subcategories as $subcategory) {
                    Subcategory::create([
                        'name'=> $subcategory,
                        'category_id'=> $category->id,
                    ]);
                }
            }
        }
    }
}
