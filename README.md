<div align="center">

<img src="https://storage.heycriss.dev/20260929010347/kash2.png" alt="Kash POS Logo" width="150" class="transition-transform duration-500 hover:scale-110 drop-shadow-xl animate-fade-in" />

# 🚀 Documentación Técnica y Funcional: Kash POS System

</div>

## 💻 1. Stack Tecnológico y Arquitectura

<div class="transition-all duration-300 hover:translate-y-[-2px]">

* **Backend:** Laravel con panel administrativo de última generación.
* **Frontend / UI:** Interfaz moderna y minimalista con soporte completo para modo oscuro y diseño adaptable.
* **Base de Datos:** Gestión de datos rápida y segura (MySQL / SQLite).
* **Despliegue e Infraestructura:** Compatible con servidores VPS Linux, entornos en la nube y optimización de rendimiento continuo.

</div>

---

## 🗂️ 2. Estructura del Menú y Módulos

> El panel administrativo está organizado por categorías lógicas para agilizar el flujo de trabajo diario.

### 📁 Operaciones
* **Deudores (Fiados):** Control exhaustivo de créditos a clientes, montos en USD, tasas de cambio personalizadas y pagos parciales o totales.
* **Productos (Inventario):** Catálogo de artículos con precios en dólares, control de stock y asociación directa con cargos de clientes.
* **Caja Registradora:** Interfaz para el registro rápido de ventas y transacciones diarias.

### 📁 Administración
* **Ajustes de Branding:** Personalización dinámica del nombre de la app, logotipos, favicones y colores corporativos.
* **Usuarios:** Gestión de roles, permisos y accesos para el personal.
* **Información / Escritorio:** Panel principal con widgets analíticos y de control.

---

## 💳 3. Sistema Avanzado de Deudores y Créditos (Fiados)

Diseñado para evitar listas interminables mediante una interfaz limpia y relacional:

* **Información Básica del Cliente:** Registro rápido de nombre, teléfono/WhatsApp y tasa BCV personalizada opcional.
* **Historial de Cargos y Abonos:** 
  * Vista en pestaña independiente por cliente.
  * Buscador integrado de productos con autocompletado de precios.
  * Selector de fecha personalizada para cada cargo.
  * <span class="text-emerald-400 font-semibold">Identificación visual:</span> Abonos en verde (restan) y deudas en rojo.
* **Acciones Rápidas en Tabla:**
  * **Abonar:** Registro de pagos parciales especificando monto ($) y método de pago (Pago Móvil, Efectivo USD), generando un ítem negativo automático.
  * **Pagar Todo:** Botón de confirmación para liquidar y limpiar la cuenta de forma masiva.

---

## ⚡ 4. Automatización y Canales de Comunicación

* **Enlaces Temporales de Pago:** Generación de enlaces seguros con validez exacta de 1 hora y sistemas de acortamiento para una experiencia limpia.
* **Módulo de WhatsApp Inteligente:**
  * Generación de **Código QR interactivo en tiempo real** directo en el modal del administrador.
  * Autocompletado de prefijo internacional para Venezuela (`+58`), detectando números locales.
  * Mensajes preconfigurados con saltos de línea profesionales y enlace directo al estado de cuenta.
* **Notificaciones por Correo Electrónico:**
  * Envío automatizado mediante plantillas de correo elegantes y profesionales.
  * Sistema de alertas integrado para soporte técnico en caso de incidencias de red.

---

## 📱 5. Capacidades PWA (Progressive Web App)

* **Instalación Nativa:** Botón interactivo de instalación (*"Instalar Kash"*) inyectado de forma fija al final de la barra lateral del panel administrativo.
* **Experiencia de Aplicación:** 
  * Configuración visual con tema corporativo, modo de pantalla completa y accesos directos optimizados.
  * Funcionamiento fluido simulando una app nativa directamente desde el navegador del dispositivo.

---

## 📊 6. Panel de Control y Widgets (Dashboard)

El escritorio principal cuenta con una disposición optimizada de widgets en tiempo real:

1. **ExchangeRatesWidget:** Tasas de cambio oficiales y paralelas actualizadas (BCV, Euro, etc.).
2. **ActionWidget:** Botones de control y recarga rápida.
3. **StatsOverview:** Indicadores clave de rendimiento, notificaciones y productos próximos a agotarse.
4. **LatestSalesWidget:** Tabla detallada de las últimas transacciones registradas.

---
