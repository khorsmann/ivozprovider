��    �      t              �  :   �  8   	  g   A	  1   �	  T  �	  p   0  T   �  �   �     �     �     �     �     �  �   �  G   �  �     C   �  5   �  
   #     .      B     c     p     �  C   �  H   �  �   &  �   �  "   f     �  	   �  I   �  �   �  �   j  (   )  �   R  �   �  �   p  �        �  1   �  "   �  O   "  q   r  b   �  #  G  7  k  _   �  3     k   7  �   �  �   R     �  2   �     .     3  )   ;     e     k  /   |     �     �     �     �     �  +     $   2  d   W  T   �  d     H   v  �   �    J  y   \   �   �   p   !  �   �!     �"  �   �"  c   r#  u   �#  }   L$     �$  1   �$  Z   %  b   ]%  7   �%     �%     &  %   &  l   C&  �   �&  �   ?'  1   �'  �   (     �(  <   �(     �(     )  &   )  (   A)     j)  	   {)  9   �)     �)  �   �)     `*     g*     �*     �*  W   �*  [   �*     O+    f+  �   w,  @   I-  t   �-  �   �-  �   �.  A   f/  G   �/  X   �/     I0     c0     }0     �0     �0  X   �0     1  _   31  Z   �1  6   �1  d   %2  c   �2  �   �2  L   �3  D   	4  C   N4  r  �4  :   6  8   @6  g   y6  1   �6  T  7  p   h8  T   �8  �   .9     �9     �9     �9     :     :  �   /:  G   ;  �   N;  C   �;  5   %<  
   [<     f<      z<     �<     �<     �<  C   �<  H   =  �   ^=  �   >  "   �>     �>  	   �>  I   �>  �   ?  �   �?  (   a@  �   �@  �   A  �   �A  �   PB     �B  1   C  "   7C  O   ZC  q   �C  b   D  #  D  7  �E  _   �F  3   ;G  k   oG  �   �G  �   �H     I  2   3I     fI     kI  )   sI     �I     �I  /   �I     �I     �I     J     J     5J  +   >J  $   jJ  d   �J  T   �J  d   IK  H   �K  �   �K    �L  y   �M  �   N  p   �N  �   (O     P  �   $P  c   �P  u   Q  }   �Q     R  1   R  Z   :R  b   �R  7   �R     0S     MS  %   US  l   {S  �   �S  �   wT  1   U  �   EU     �U  <   �U     *V     CV  &   RV  (   yV     �V  	   �V  9   �V     �V  �   W     �W     �W     �W     �W  W   �W  [   +X     �X    �X  �   �Y  @   �Z  t   �Z  �   7[  �   \  A   �\  G   �\  X   (]     �]     �]     �]     �]     �]  X   �]     R^  _   k^  Z   �^  6   &_  d   ]_  c   �_  �   &`  L   �`  D   Aa  C   �a   **Configuración de Empresa** > **Histórico de llamadas** **Configuración de Marca** > **Histórico de llamadas** **El período de facturación determina cada cuántos segundos se incrementa el precio de la llamada**. **Gestión general** > **Histórico de llamadas** **No se puede retarificar una llamada que esté incluida en una factura**. Es decir, si la llamada seleccionada tiene el campo **Factura** con valor, habrá que borrar esta factura previamente. El motivo es estar seguros que no existen facturas con llamadas mal tarificadas: si retarificas una llamada, regeneras la factura que la contiene. **Un plan de precios agrupa un listado de patrones de precio (prefijos de llamada) con sus detalles de precio**: :ref:`Plan de precio <price_plan>` en base al cual se ha puesto precio a la llamada. A la hora de generar una factura, como se verá más adelante, se podrá indicar cuáles de estos conceptos se incluyen en la factura (y en qué cantidades). A nivel de empresa A nivel de marca A nivel de marca. A nivel global (*god*). A nivel global (god) A pesar de que la ventana anterior nos permite importar archivos `CSV <https://es.wikipedia.org/wiki/CSV>`_ en distintos formatos, lo mejor es importar un archivo en el formato adecuado para simplicar este proceso. Accedemos al listado (vacío) del plan de precio que acabamos de crear: Antes de generar una factura de ejemplo, es importante entender que las facturas generadas utilizan unas plantillas que permiten su modificación. Añadamos ahora unos costes fijos a esta factura concreta pulsando: Añadimos una factura nueva para explicar el proceso: Compañía Contrato de peering Coste calculado para la llamada. Costes fijos Creacion de una factura Creación manual Crear facturas que recojan el detalle y el consumo de sus empresas. Crear planes de precio para poner precio a las llamadas de los usuarios. Dado que ciertas llamadas entrantes pueden implicar coste (ver :ref:`tarificación de llamadas entrantes <bill_inbound>`), indica si la llamada es entrante o saliente. De este modo, cada *operador de marca* puede crear plantillas con los datos deseados, la estética deseada, añadir logos y hasta gráficas de consumo. Descripción del patrón de precio Destino Duración El botón clave para este proceso de importación masiva es el siguiente: El exportador a `CSV <https://es.wikipedia.org/wiki/CSV>`_ permite exportar el listado para su posterior almacenamiento o procesado. El formato del archivo `CSV <https://es.wikipedia.org/wiki/CSV>`_ está explicado en la propia sección de ayuda contextual, que incluye un enlace para poder descargar un archivo de ejemplo: El formato, por lo tanto, tiene que ser: El objetivo final de todo el proceso de facturación es generar facturas que incluyan las llamadas con coste de una empresa concreta. El primer paso es crear un plan de precios vacío sobre el que importar nuestros precios (sección **Configuración de marca** > **Planes de precio**): El proceso de importación se realiza en segundo plano, permitiendo al administrador de marca seguir configurando otros aspectos de la plataforma mientras se completa. El sistema de importación creará los patrones de precio que sean necesarios. Si ya existe un patrón de precios con ese prefijo, no se creará, simplemente se vinculará. Empresa Empresa para la cual estamos generando la factura Empresa responsable de la llamada. En cada uno de los niveles se muestran las llamadas filtradas convenientemente. En el momento en el que una llamada que implique coste se cuelga, aparece en el listado de :ref:`billable_calls`. En el momento en el que una llamada se va a establecer, se verifica que se vaya a poder tarificar. En ese momento, es posible que el futuro administrador de marca se haya dado cuenta de la titánica tarea que implicaría crear miles de patrones de precio (254 países por las distintas redes móviles, fijos, numeraciones especiales, etc.) para luego poder agruparlos en un plan de precios. En esta ventana podríamos seleccionar qué contiene cada columna, en caso de no haber creado el `CSV <https://es.wikipedia.org/wiki/CSV>`_ en el formato recomendado. Del mismo modo, se nos ofrece la posibilidad de ignorar la primera línea, en caso de que incluya los nombres de las columnas en lugar de datos. En este bloque se tratará un tema de primordial importancia para los administradores de marca: En este punto, podemos generar la factura pulsando: En este último caso, el coste de la llamada se calcularía utilizando el plan de precio de menor métrica. En la sección :ref:`noplan_nocall` se hacía una introducción bastante completa sobre el proceso manual de creación de un plan de precios y los conceptos más importantes: Es por ello que el proceso de creación de planes y patrones de precio se realiza partiendo de un `CSV <https://es.wikipedia.org/wiki/CSV>`_. Establecimiento de llamada Estos listados muestran la siguiente información: Etc. Factura Facturación por segundos / minutos /etc. Fecha Fecha inicio/fin Fecha y hora del establecimiento de la llamada. Formato CSV Generación de facturas Histórico de llamadas Importación vía CSV Impuesto Impuesto a añadir al coste total calculado Indica cuánto ha durado la llamada. Indica el :ref:`patrón de precio <price_pattern>` en base al cual se ha puesto precio a la llamada. Indica por qué :ref:`Contrato de peering <peering_contracts>` ha salido la llamada. Indica si el proceso que pone precio a las llamadas ha calculado el precio de esta llamada concreta. Indica si la llamada está incluida en alguna :ref:`factura <invoices>`. La :ref:`creación manual de un plan de precio <price_plan>` implicaba la creación previa de un :ref:`patrón de precio <price_pattern>`. La ayuda contextual de la sección **Configuración de Marca** > **Plantillas de facturas** incluye una explicación resumida del proceso de creación de plantillas. En la `página oficial de PHPPdf <https://github.com/psliwa/PHPPdf>`_ se puede encontrar más información. La fecha fin tiene que ser una fecha ya pasada. Es decir, no se puede sacar facturas de tramos futuros o del día actual. La gran diferencia respecto a las llamadas del :ref:`call_registry` es que todas las que aparecen aquí implican coste (no aparecen, por tanto, llamadas internas, etc.) La sección **Facturas** es la que permite al **operador de marca** generar facturas para emitir a sus empresas. Las llamadas aparecen en este listado en cuanto se cuelgan. Pasados unos minutos, el proceso que pone precios a las llamadas habrá tarificado la llamada (*Tarificado* igual a 'Sí') y tendremos disponible el **Precio** calculado. Llamadas facturables Los costes fijos son un concepto fijo que se pueden añadir a las facturas que utilicen plantillas que tengan en cuenta costes fijos. Los históricos de llamadas muestran todas las llamadas de la plataforma y se muestran a 3 niveles: Los listados de llamadas de las secciones **Llamadas facturables** muestran solo las **llamadas que implican coste**. Los números decimales tienen que estar entrecomillados con comillas dobles y tienen que usar la coma como separador decimal. Marca Muestra todas las llamadas de la empresa emulada: Muestra todas las llamadas de la marca emulada, indicando la empresa de cada una de ellas: Muestra todas las llamadas de la plataforma, indicando la marca y la empresa de cada una de ellas: Múltiples planes de precios con métricas incorrectas. Nombre del patrón de precio Número Número externo al que se ha llamado. Para estos casos, el *administrador de marca* puede re-tarificar las llamadas que considere mal tarificadas. Para facturación por minutos, habrá que poner 60 en este campo y, cada bloque de 1 minuto se sumará el *precio por minuto* al precio final. Para retarificar, basta con seleccionar las llamadas en **Configuración de Marca** > **Llamada facturables** y presionar el botón **Tarificar llamadas**: Pare ello, abordaremos las siguientes cuestiones: Pasados unos minutos, el proceso tarificador evaluará las llamadas tarificables sin coste y rellenará los siguientes campos del registro anterior: Patrón de destino Patrón de destino (que es en realidad el patrón de precio) Período de facturación Plan de precio Plan de precio adicional sin vincular. Plan de precio importado con una errata. Planes de precio Plantilla Plantilla que queremos utilizar para generar esta factura Plantillas de facturas Por defecto, IvozProvider incluye las siguientes plantillas de ejemplo (en la ayuda contextual se pueden encontrar enlaces a las mismas): Precio Precio de establecimiento Precio por minuto Prefijo Puede ocurrir que una llamada se tarifique de forma incorrecta, por múltiples motivos: Pulsando el siguiente botón podemos ver las llamadas que han sido incluidas en la factura: Retarificación manual Retarificar una llamada consiste en volver a calcular el precio de la misma. Lógicamente, la retarificación se calculará en el momento solicitado, teniendo en cuenta las configuración actual de planes de precio (y no las del momento del establecimiento de la llamada). Se muestra el coste asociado a las llamadas (una vez calculado) y, dado que las empresas son notificadas de sus llamadas por medio de facturas emitidas por el *operador de marca*, solo se existe a dos niveles: Será incluído en la factura y representa el número de factura Si no se va a poder tarificar atendiendo a los planes de precios activos para la empresa, la llamada no se cursará. Si se accede a una llamada concreta, se muestra información adicional sobre la misma. Esta información adicional depende del nivel (*god*, marca o empresa) y provee información sobre desvíos, transferencias, etc. Si se pone a 1, implica una tarificación por segundos y cada segundo implicará un coste que será el *precio por minuto* dividido entre 60. Sirva la siguiente imagen de ejemplo (sección **Costes Fijos**): Solo visible a nivel *god*, indica la marca de la empresa en cuestión. Tal y como se ha explicado con anterioridad, el proceso de tarificación es automático: Tarificación automática Tarificación de llamadas Tarificación y facturación Tarificado (sí/no) Tarificado a 'Sí' Tarificar una llamada es la **acción de poner precio** a una llamada que implica coste. Tipo (entrante/saliente) Todas las llamadas del tramo escogido tienen que estar facturadas para poder emitir la factura. Todo ello se realiza utilizando la librería `PHPPdf <https://github.com/psliwa/PHPPdf>`_. Tramo temporal cuyas llamadas queremos tener en cuenta Un plan de precios se asocia a una empresa concreta, indicando el período de validez de dicho plan. Una empresa podía tener varios planes de precios en un momento concreto para una llamada concreta. Una vez completada la importación, solo faltaría asociar el nuevo plan de precios a las empresas que queramos, siguiendo :ref:`el procedimiento explicado en el bloque anterior <pricing_plan_to_company>`. Una vez elegido el archivo a importar, se nos presenta la siguiente ventana: Y añadamos los costes fijos que queramos, así como sus cantidades: Y pulsando este botón podemos descargar la factura en formato PDF: Project-Id-Version: IvozProvider 1.0
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2016-10-25 13:31+0200
PO-Revision-Date: YEAR-MO-DA HO:MI+ZONE
Last-Translator: FULL NAME <EMAIL@ADDRESS>
Language-Team: en <LL@li.org>
Plural-Forms: nplurals=2; plural=(n != 1)
MIME-Version: 1.0
Content-Type: text/plain; charset=utf-8
Content-Transfer-Encoding: 8bit
Generated-By: Babel 1.3
 **Configuración de Empresa** > **Histórico de llamadas** **Configuración de Marca** > **Histórico de llamadas** **El período de facturación determina cada cuántos segundos se incrementa el precio de la llamada**. **Gestión general** > **Histórico de llamadas** **No se puede retarificar una llamada que esté incluida en una factura**. Es decir, si la llamada seleccionada tiene el campo **Factura** con valor, habrá que borrar esta factura previamente. El motivo es estar seguros que no existen facturas con llamadas mal tarificadas: si retarificas una llamada, regeneras la factura que la contiene. **Un plan de precios agrupa un listado de patrones de precio (prefijos de llamada) con sus detalles de precio**: :ref:`Plan de precio <price_plan>` en base al cual se ha puesto precio a la llamada. A la hora de generar una factura, como se verá más adelante, se podrá indicar cuáles de estos conceptos se incluyen en la factura (y en qué cantidades). A nivel de empresa A nivel de marca A nivel de marca. A nivel global (*god*). A nivel global (god) A pesar de que la ventana anterior nos permite importar archivos `CSV <https://es.wikipedia.org/wiki/CSV>`_ en distintos formatos, lo mejor es importar un archivo en el formato adecuado para simplicar este proceso. Accedemos al listado (vacío) del plan de precio que acabamos de crear: Antes de generar una factura de ejemplo, es importante entender que las facturas generadas utilizan unas plantillas que permiten su modificación. Añadamos ahora unos costes fijos a esta factura concreta pulsando: Añadimos una factura nueva para explicar el proceso: Compañía Contrato de peering Coste calculado para la llamada. Costes fijos Creacion de una factura Creación manual Crear facturas que recojan el detalle y el consumo de sus empresas. Crear planes de precio para poner precio a las llamadas de los usuarios. Dado que ciertas llamadas entrantes pueden implicar coste (ver :ref:`tarificación de llamadas entrantes <bill_inbound>`), indica si la llamada es entrante o saliente. De este modo, cada *operador de marca* puede crear plantillas con los datos deseados, la estética deseada, añadir logos y hasta gráficas de consumo. Descripción del patrón de precio Destino Duración El botón clave para este proceso de importación masiva es el siguiente: El exportador a `CSV <https://es.wikipedia.org/wiki/CSV>`_ permite exportar el listado para su posterior almacenamiento o procesado. El formato del archivo `CSV <https://es.wikipedia.org/wiki/CSV>`_ está explicado en la propia sección de ayuda contextual, que incluye un enlace para poder descargar un archivo de ejemplo: El formato, por lo tanto, tiene que ser: El objetivo final de todo el proceso de facturación es generar facturas que incluyan las llamadas con coste de una empresa concreta. El primer paso es crear un plan de precios vacío sobre el que importar nuestros precios (sección **Configuración de marca** > **Planes de precio**): El proceso de importación se realiza en segundo plano, permitiendo al administrador de marca seguir configurando otros aspectos de la plataforma mientras se completa. El sistema de importación creará los patrones de precio que sean necesarios. Si ya existe un patrón de precios con ese prefijo, no se creará, simplemente se vinculará. Empresa Empresa para la cual estamos generando la factura Empresa responsable de la llamada. En cada uno de los niveles se muestran las llamadas filtradas convenientemente. En el momento en el que una llamada que implique coste se cuelga, aparece en el listado de :ref:`billable_calls`. En el momento en el que una llamada se va a establecer, se verifica que se vaya a poder tarificar. En ese momento, es posible que el futuro administrador de marca se haya dado cuenta de la titánica tarea que implicaría crear miles de patrones de precio (254 países por las distintas redes móviles, fijos, numeraciones especiales, etc.) para luego poder agruparlos en un plan de precios. En esta ventana podríamos seleccionar qué contiene cada columna, en caso de no haber creado el `CSV <https://es.wikipedia.org/wiki/CSV>`_ en el formato recomendado. Del mismo modo, se nos ofrece la posibilidad de ignorar la primera línea, en caso de que incluya los nombres de las columnas en lugar de datos. En este bloque se tratará un tema de primordial importancia para los administradores de marca: En este punto, podemos generar la factura pulsando: En este último caso, el coste de la llamada se calcularía utilizando el plan de precio de menor métrica. En la sección :ref:`noplan_nocall` se hacía una introducción bastante completa sobre el proceso manual de creación de un plan de precios y los conceptos más importantes: Es por ello que el proceso de creación de planes y patrones de precio se realiza partiendo de un `CSV <https://es.wikipedia.org/wiki/CSV>`_. Establecimiento de llamada Estos listados muestran la siguiente información: Etc. Factura Facturación por segundos / minutos /etc. Fecha Fecha inicio/fin Fecha y hora del establecimiento de la llamada. Formato CSV Generación de facturas Histórico de llamadas Importación vía CSV Impuesto Impuesto a añadir al coste total calculado Indica cuánto ha durado la llamada. Indica el :ref:`patrón de precio <price_pattern>` en base al cual se ha puesto precio a la llamada. Indica por qué :ref:`Contrato de peering <peering_contracts>` ha salido la llamada. Indica si el proceso que pone precio a las llamadas ha calculado el precio de esta llamada concreta. Indica si la llamada está incluida en alguna :ref:`factura <invoices>`. La :ref:`creación manual de un plan de precio <price_plan>` implicaba la creación previa de un :ref:`patrón de precio <price_pattern>`. La ayuda contextual de la sección **Configuración de Marca** > **Plantillas de facturas** incluye una explicación resumida del proceso de creación de plantillas. En la `página oficial de PHPPdf <https://github.com/psliwa/PHPPdf>`_ se puede encontrar más información. La fecha fin tiene que ser una fecha ya pasada. Es decir, no se puede sacar facturas de tramos futuros o del día actual. La gran diferencia respecto a las llamadas del :ref:`call_registry` es que todas las que aparecen aquí implican coste (no aparecen, por tanto, llamadas internas, etc.) La sección **Facturas** es la que permite al **operador de marca** generar facturas para emitir a sus empresas. Las llamadas aparecen en este listado en cuanto se cuelgan. Pasados unos minutos, el proceso que pone precios a las llamadas habrá tarificado la llamada (*Tarificado* igual a 'Sí') y tendremos disponible el **Precio** calculado. Llamadas facturables Los costes fijos son un concepto fijo que se pueden añadir a las facturas que utilicen plantillas que tengan en cuenta costes fijos. Los históricos de llamadas muestran todas las llamadas de la plataforma y se muestran a 3 niveles: Los listados de llamadas de las secciones **Llamadas facturables** muestran solo las **llamadas que implican coste**. Los números decimales tienen que estar entrecomillados con comillas dobles y tienen que usar la coma como separador decimal. Marca Muestra todas las llamadas de la empresa emulada: Muestra todas las llamadas de la marca emulada, indicando la empresa de cada una de ellas: Muestra todas las llamadas de la plataforma, indicando la marca y la empresa de cada una de ellas: Múltiples planes de precios con métricas incorrectas. Nombre del patrón de precio Número Número externo al que se ha llamado. Para estos casos, el *administrador de marca* puede re-tarificar las llamadas que considere mal tarificadas. Para facturación por minutos, habrá que poner 60 en este campo y, cada bloque de 1 minuto se sumará el *precio por minuto* al precio final. Para retarificar, basta con seleccionar las llamadas en **Configuración de Marca** > **Llamada facturables** y presionar el botón **Tarificar llamadas**: Pare ello, abordaremos las siguientes cuestiones: Pasados unos minutos, el proceso tarificador evaluará las llamadas tarificables sin coste y rellenará los siguientes campos del registro anterior: Patrón de destino Patrón de destino (que es en realidad el patrón de precio) Período de facturación Plan de precio Plan de precio adicional sin vincular. Plan de precio importado con una errata. Planes de precio Plantilla Plantilla que queremos utilizar para generar esta factura Plantillas de facturas Por defecto, IvozProvider incluye las siguientes plantillas de ejemplo (en la ayuda contextual se pueden encontrar enlaces a las mismas): Precio Precio de establecimiento Precio por minuto Prefijo Puede ocurrir que una llamada se tarifique de forma incorrecta, por múltiples motivos: Pulsando el siguiente botón podemos ver las llamadas que han sido incluidas en la factura: Retarificación manual Retarificar una llamada consiste en volver a calcular el precio de la misma. Lógicamente, la retarificación se calculará en el momento solicitado, teniendo en cuenta las configuración actual de planes de precio (y no las del momento del establecimiento de la llamada). Se muestra el coste asociado a las llamadas (una vez calculado) y, dado que las empresas son notificadas de sus llamadas por medio de facturas emitidas por el *operador de marca*, solo se existe a dos niveles: Será incluído en la factura y representa el número de factura Si no se va a poder tarificar atendiendo a los planes de precios activos para la empresa, la llamada no se cursará. Si se accede a una llamada concreta, se muestra información adicional sobre la misma. Esta información adicional depende del nivel (*god*, marca o empresa) y provee información sobre desvíos, transferencias, etc. Si se pone a 1, implica una tarificación por segundos y cada segundo implicará un coste que será el *precio por minuto* dividido entre 60. Sirva la siguiente imagen de ejemplo (sección **Costes Fijos**): Solo visible a nivel *god*, indica la marca de la empresa en cuestión. Tal y como se ha explicado con anterioridad, el proceso de tarificación es automático: Tarificación automática Tarificación de llamadas Tarificación y facturación Tarificado (sí/no) Tarificado a 'Sí' Tarificar una llamada es la **acción de poner precio** a una llamada que implica coste. Tipo (entrante/saliente) Todas las llamadas del tramo escogido tienen que estar facturadas para poder emitir la factura. Todo ello se realiza utilizando la librería `PHPPdf <https://github.com/psliwa/PHPPdf>`_. Tramo temporal cuyas llamadas queremos tener en cuenta Un plan de precios se asocia a una empresa concreta, indicando el período de validez de dicho plan. Una empresa podía tener varios planes de precios en un momento concreto para una llamada concreta. Una vez completada la importación, solo faltaría asociar el nuevo plan de precios a las empresas que queramos, siguiendo :ref:`el procedimiento explicado en el bloque anterior <pricing_plan_to_company>`. Una vez elegido el archivo a importar, se nos presenta la siguiente ventana: Y añadamos los costes fijos que queramos, así como sus cantidades: Y pulsando este botón podemos descargar la factura en formato PDF: 