��          �               �     �     �     �  R   �       !     �   @     �  3  �  V     0   \  �   �       <   %  <   b  �   �  �   A  <   �  �   �  g   �  j     !   �  r  �     
     3
     A
  R   G
     �
  !   �
  �   �
     L  3  [  V   �  0   �  �        �  <   �  <   �  �   )  �   �  <   L  �   �  g   9  j   �  !      Creación de un fax virtual DDI de salida Email Email donde se recibirán los mails (en caso de marcar 'Enviar por email' a 'Sí') Emitir un fax Enviar faxes partiendo de un PDF. Esta es la interfaz que nos encontramos al crear un nuevo fax en la sección **Configuración de empresa** > **Faxes Virtuales**: Faxing Virtual IvozProvider utiliza `T.38 <http://www.voip-info.org/wiki/view/T.38>`_ para la emisión y recepción de faxes. Es responsabilidad de el administrador de marca disponer de Contratos de Peering con operadores que soporten dicho protocolo, así como configurar las rutas de salida para utilizar dicho operador. La solución de *faxing* virtual incluida en IvozProvider es muy simple, pero permite: Los campos son prácticamente auto-explicativos: Los faxes entrantes se pueden recibir vía correo electrónico, pero también pueden ser visualizados y descargados desde el panel web pulsando: Nombre Nombre por el que se referenciará el fax en otras secciones Número que se utilizará como origen en los faxes salientes Para enviar faxes por una ruta concreta (que tenemos probada y sabemos que es óptima para la emisión de faxes), se puede definir una ruta exclusiva para faxes: Para recibir faxes en dicha numeración, será necesario apuntarla a nuestro nuevo fax, editando el DDI en la sección **DDIs**: Recibir faxes vía correo electrónico y visualización web. Si se definieran más rutas de faxing, se utilizarían todas siguiendo las lógicas de *load-balancing* y *failover* descritas en :ref:`secciones anteriores <routes_metrics>`. Si una empresa no dispone de rutas de faxing, saldrá siguiendo las lógicas de rutado de las llamadas. Todos los faxes que envíe esa empresa (para todos los faxes que vaya creando), se enviará por esta ruta. Visualización de faxes entrantes Project-Id-Version: IvozProvider 1.0
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
 Creación de un fax virtual DDI de salida Email Email donde se recibirán los mails (en caso de marcar 'Enviar por email' a 'Sí') Emitir un fax Enviar faxes partiendo de un PDF. Esta es la interfaz que nos encontramos al crear un nuevo fax en la sección **Configuración de empresa** > **Faxes Virtuales**: Faxing Virtual IvozProvider utiliza `T.38 <http://www.voip-info.org/wiki/view/T.38>`_ para la emisión y recepción de faxes. Es responsabilidad de el administrador de marca disponer de Contratos de Peering con operadores que soporten dicho protocolo, así como configurar las rutas de salida para utilizar dicho operador. La solución de *faxing* virtual incluida en IvozProvider es muy simple, pero permite: Los campos son prácticamente auto-explicativos: Los faxes entrantes se pueden recibir vía correo electrónico, pero también pueden ser visualizados y descargados desde el panel web pulsando: Nombre Nombre por el que se referenciará el fax en otras secciones Número que se utilizará como origen en los faxes salientes Para enviar faxes por una ruta concreta (que tenemos probada y sabemos que es óptima para la emisión de faxes), se puede definir una ruta exclusiva para faxes: Para recibir faxes en dicha numeración, será necesario apuntarla a nuestro nuevo fax, editando el DDI en la sección **DDIs**: Recibir faxes vía correo electrónico y visualización web. Si se definieran más rutas de faxing, se utilizarían todas siguiendo las lógicas de *load-balancing* y *failover* descritas en :ref:`secciones anteriores <routes_metrics>`. Si una empresa no dispone de rutas de faxing, saldrá siguiendo las lógicas de rutado de las llamadas. Todos los faxes que envíe esa empresa (para todos los faxes que vaya creando), se enviará por esta ruta. Visualización de faxes entrantes 