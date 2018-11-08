<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
               Permission::create([
                'name' =>'Navegacion de intranet',
                'slug' =>'intranet.index',
                'description' =>'Listar intranet',
               ]);
               #usuarios
               Permission::create([
                'name' =>'Navegar en Usuarios',
                'slug' =>'users.index',
                'description' =>'Listar y navegar el Usuarios',
               ]);
               Permission::create([
                'name' =>'Registrar Usuarios',
                'slug' =>'users.create',
                'description' =>'Registrar Usuarios',
               ]);
               Permission::create([
                'name' =>'Ver Usuarios',
                'slug' =>'users.show',
                'description' =>'ver detalle Usuarios del sistema',
               ]);
               Permission::create([
                'name' =>'Editar Usuarios',
                'slug' =>'users.edit',
                'description' =>'Editar Usuarios',
               ]);

                #personal
               Permission::create([
                'name' =>'Ver personal',
                'slug' =>'personal.index',
                'description' =>'Listar personal',
               ]);
               Permission::create([
                'name' =>'Navegacion de personal',
                'slug' =>'personal.create',
                'description' =>'Crear personal',
               ]);
               Permission::create([
                'name' =>'Crear cargo',
                'slug' =>'personal.createc',
                'description' =>'Crear cargo',
               ]);
               Permission::create([
                'name' =>'Ver detalle personal',
                'slug' =>'personal.show',
                'description' =>'ver detalle',
               ]);
               Permission::create([
                'name' =>'Edicion personal',
                'slug' =>'personal.edit',
                'description' =>'ver edicion personal',
               ]);
               #inventario
               Permission::create([
                'name' =>'Navegar en inventario',
                'slug' =>'inventario.index',
                'description' =>'Listar y navegar el inventario',
               ]);
               Permission::create([
                'name' =>'Registrar inventario',
                'slug' =>'inventario.create',
                'description' =>'Registrar inventario',
               ]);
               Permission::create([
                'name' =>'Ver inventario',
                'slug' =>'inventario.show',
                'description' =>'ver detalle inventario del sistema',
               ]);
               Permission::create([
                'name' =>'Editar inventario',
                'slug' =>'inventario.edit',
                'description' =>'Editar inventario',
               ]);
        
               #producto
               Permission::create([
                'name' =>'Navegar en Producto',
                'slug' =>'producto.index',
                'description' =>'Listar y navegar el Producto',
               ]);
               Permission::create([
                'name' =>'Registrar de producto',
                'slug' =>'producto.create',
                'description' =>'Registrar producto',
               ]);
               Permission::create([
                'name' =>'Ver Producto',
                'slug' =>'producto.show',
                'description' =>'ver detalle producto del sistema',
               ]);
               Permission::create([
                'name' =>'Editar producto',
                'slug' =>'producto.edit',
                'description' =>'Editar Producto',
               ]);
        
               #proveedor
               Permission::create([
                'name' =>'Navegar en proveedor',
                'slug' =>'proveedor.index',
                'description' =>'Listar y navegar el proveedor',
               ]);
               Permission::create([
                'name' =>'Registrar proveedor',
                'slug' =>'proveedor.create',
                'description' =>'Crear proveedor',
               ]);
               Permission::create([
                'name' =>'Ver proveedor',
                'slug' =>'proveedor.show',
                'description' =>'ver detalle proveedor del sistema',
               ]);
               Permission::create([
                'name' =>'Editar proveedor',
                'slug' =>'proveedor.edit',
                'description' =>'Editar proveedor',
               ]);
        
               #cotizacion
               Permission::create([
                'name' =>'Navegar en cotización',
                'slug' =>'cotizacion.index',
                'description' =>'Listar y navegar el cotización',
               ]);
               Permission::create([
                'name' =>'Registro de solicitud de cotización',
                'slug' =>'cotizacion.create',
                'description' =>'Crear proveedor',
               ]);
               Permission::create([
                'name' =>'Ver cotizacion',
                'slug' =>'cotizacion.show',
                'description' =>'ver detalle cotización del sistema',
               ]);
               Permission::create([
                'name' =>'Editar cotización',
                'slug' =>'cotizacion.edit',
                'description' =>'Editar cotización',
               ]);
        
            #clientes
            Permission::create([
                'name' =>'Navegar en Clientes',
                'slug' =>'clientes.index',
                'description' =>'Listar y navegar el Clientes',
               ]);
               Permission::create([
                'name' =>'Registro de Clientes',
                'slug' =>'clientes.create',
                'description' =>'Crear Cliente',
               ]);
               Permission::create([
                'name' =>'Ver Clientes',
                'slug' =>'clientes.show',
                'description' =>'ver detalle clientes del sistema',
               ]);
               Permission::create([
                'name' =>'Editar Clientes',
                'slug' =>'clientes.edit',
                'description' =>'Editar Clientes',
               ]);
        
               #roles
               Permission::create([
                'name' =>'Navegar en rol',
                'slug' =>'roles.index',
                'description' =>'Listar y navegar roles del sistema',
               ]);
               Permission::create([
                'name' =>'Registro de rol',
                'slug' =>'roles.create',
                'description' =>'Crear rol',
               ]);
               Permission::create([
                'name' =>'Ver rol',
                'slug' =>'roles.show',
                'description' =>'ver detalle rol del sistema',
               ]);
               Permission::create([
                'name' =>'Editar rol',
                'slug' =>'roles.edit',
                'description' =>'Editar rol',
               ]);
               }     
        
        
    
}
