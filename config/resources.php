<?php

return [
    "teachers" => [
        "resource" => "teachers",
        "roles"    => ["admin", "director"],
        "fields"   => [
            "name"          => ["label" => "Nombre",       "type" => "text"],
            "surname"       => ["label" => "Apellidos",    "type" => "text"],
            "email"         => ["label" => "Email",        "type" => "email"],
            "phone"         => ["label" => "Teléfono",     "type" => "text"],
            "department_id" => ["label" => "Departamento", "type" => "select"],
        ],
    ],
    "students" => [
        "resource" => "students",
        "roles"    => ["admin", "director", "profesor"],
        "fields"   => [
            "name"       => ["label" => "Nombre",      "type" => "text"],
            "surname"    => ["label" => "Apellidos",   "type" => "text"],
            "email"      => ["label" => "Email",       "type" => "email"],
            "phone"      => ["label" => "Teléfono",    "type" => "text"],
            "birth_date" => ["label" => "Fecha Nac.",  "type" => "date"],
        ],
    ],
    "departments" => [
        "resource" => "departments",
        "roles"    => ["admin", "director"],
        "fields"   => [
            "name"        => ["label" => "Nombre",      "type" => "text"],
            "code"        => ["label" => "Código",      "type" => "text"],
            "description" => ["label" => "Descripción", "type" => "textarea"],
        ],
    ],
    "groups" => [
        "resource" => "groups",
        "roles"    => ["admin", "director"],
        "fields"   => [
            "name"   => ["label" => "Nombre", "type" => "text"],
            "code"   => ["label" => "Código", "type" => "text"],
            "course" => ["label" => "Curso",  "type" => "text"],
        ],
    ],
    "subjects" => [
        "resource" => "subjects",
        "roles"    => ["admin", "director"],
        "fields"   => [
            "name"          => ["label" => "Nombre",       "type" => "text"],
            "code"          => ["label" => "Código",       "type" => "text"],
            "description"   => ["label" => "Descripción",  "type" => "textarea"],
            "department_id" => ["label" => "Departamento", "type" => "select"],
        ],
    ],
    "projects" => [
        "resource" => "projects",
        "roles"    => ["admin", "profesor"],
        "fields"   => [
            "title"       => ["label" => "Título",       "type" => "text"],
            "description" => ["label" => "Descripción",  "type" => "textarea"],
            "hours"       => ["label" => "Horas",        "type" => "number"],
            "start_date"  => ["label" => "Fecha inicio", "type" => "date"],
        ],
    ],
    "tasks" => [
        "resource" => "tasks",
        "roles"    => ["admin", "profesor"],
        "fields"   => [
            "name"        => ["label" => "Nombre",      "type" => "text"],
            "description" => ["label" => "Descripción", "type" => "textarea"],
            "priority"    => ["label" => "Prioridad",   "type" => "text"],
            "status"      => ["label" => "Estado",      "type" => "text"],
        ],
    ],
];
