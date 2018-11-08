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
                'description' =>'Ver Inicio Intranet',
               ]);
               #usuarios
               Permission::create([
                'name' =>'Navegar en Usuarios',
                'slug' =>'users.index',
                'description' =>'Listar el Usuarios',
               ]);
               Permission::create([
                'name' =>'Registrar Usuarios',
                'slug' =>'users.create',
                'description' =>'Registrar Usuarios',
               ]);
               Permission::create([
                'name' =>'Ver Usuarios',
                'slug' =>'users.show',
                'description' =>'Ver detalle de Usuarios',
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
                'description' =>'Listar Personal',
               ]);
               Permission::create([
                'name' =>'Navegacion de personal',
                'slug' =>'personal.create',
                'description' =>'Crear Personal',
               ]);
               Permission::create([
                'name' =>'Crear cargo',
                'slug' =>'personal.createc',
                'description' =>'Crear Cargo',
               ]);
               Permission::create([
                'name' =>'Ver detalle personal',
                'slug' =>'personal.show',
                'description' =>'Ver Detalle de Personal',
               ]);
               Permission::create([
                'name' =>'Edicion personal',
                'slug' =>'personal.edit',
                'description' =>'Editar Personal',
               ]);
               #inventario
               Permission::create([
                'name' =>'Navegar en inventario',
                'slug' =>'inventario.index',
                'description' =>'Listar Inventario',
               ]);
               Permission::create([
                'name' =>'Registrar inventario',
                'slug' =>'inventario.create',
                'description' =>'Registrar Inventario',
               ]);
               Permission::create([
                'name' =>'Ver inventario',
                'slug' =>'inventario.show',
                'description' =>'ver detalle Inventario',
               ]);
               Permission::create([
                'name' =>'Editar inventario',
                'slug' =>'inventario.edit',
                'description' =>'Editar Inventario',
               ]);
        
               #producto
               Permission::create([
                'name' =>'Navegar en Producto',
                'slug' =>'producto.index',
                'description' =>'Listar Productos',
               ]);
               Permission::create([
                'name' =>'Registrar de producto',
                'slug' =>'producto.create',
                'description' =>'Registrar Productos',
               ]);
               Permission::create([
                'name' =>'Ver Producto',
                'slug' =>'producto.show',
                'description' =>'Ver Detalle Producto',
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
                'description' =>'Listar los Proveedores',
               ]);
               Permission::create([
                'name' =>'Registrar proveedor',
                'slug' =>'proveedor.create',
                'description' =>'Crear Proveedores',
               ]);
               Permission::create([
                'name' =>'Ver proveedor',
                'slug' =>'proveedor.show',
                'description' =>'Ver Detalle Proveedor',
               ]);
               Permission::create([
                'name' =>'Editar proveedor',
                'slug' =>'proveedor.edit',
                'description' =>'Editar Proveedores',
               ]);
        
               #cotizacion
               Permission::create([
                'name' =>'Navegar en cotización',
                'slug' =>'cotizacion.index',
                'description' =>'Listar Cotizaciones',
               ]);
               Permission::create([
                'name' =>'Registro de solicitud de cotización',
                'slug' =>'cotizacion.create',
                'description' =>'Crear Solicitud de Cotizaciones',
               ]);
               Permission::create([
                'name' =>'Ver cotizacion',
                'slug' =>'cotizacion.show',
                'description' =>'Ver Detalle Cotización',
               ]);
               Permission::create([
                'name' =>'Editar cotización',
                'slug' =>'cotizacion.edit',
                'description' =>'Editar Cotizacion',
               ]);
        
            #clientes
            Permission::create([
                'name' =>'Navegar en Clientes',
                'slug' =>'clientes.index',
                'description' =>'Listar Clientes',
               ]);
               Permission::create([
                'name' =>'Registro de Clientes',
                'slug' =>'clientes.create',
                'description' =>'Crear Cliente',
               ]);
               Permission::create([
                'name' =>'Ver Clientes',
                'slug' =>'clientes.show',
                'description' =>'Ver Detalle Clientes',
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
                'description' =>'Listar Roles',
               ]);
               Permission::create([
                'name' =>'Registro de rol',
                'slug' =>'roles.create',
                'description' =>'Crear Roles',
               ]);
               Permission::create([
                'name' =>'Ver rol',
                'slug' =>'roles.show',
                'description' =>'Ver Detalle Rol',
               ]);
               Permission::create([
                'name' =>'Editar rol',
                'slug' =>'roles.edit',
                'description' =>'Editar Roles',
               ]);
               }     
        
        
    
}
