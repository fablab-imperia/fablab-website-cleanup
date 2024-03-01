# Sito Fablab alleggerito

Riscrittura ultra ottimizzata e all'osso creata in puro CSS e PHP del sito Fablab Imperia.

- pagina amministrazione
- db sqlite


Dopo aver clonato il repository, eseguire
```bash
git submodule init
git submodule update
```

## Organizzazione

Cartelle:
- `private`, non accessibile da web, mantiene piccole cose php da includere, il database e la libreria php per Markdown
- `assets`, contiene tutti i file css, js e immagini del sito di base. NON contiene le immagini caricate dagli utenti per il blog
- `sql`, il file SQL per generare la tabella SQL vuota



## Copyright

This is NOT public domain, make sure to respect the license terms.
You can find the license text in the COPYING file.

Copyright © 2024 Fablab Imperia, Massimo Gismondi  
This program is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.  
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU Affero General Public License along with this program. If not, see https://www.gnu.org/licenses/.


### Dipendenze

Vengono usati i seguenti progetti esterni, qui elencati con le relative licenze.
| Progetto | file | licenza |
|----------|------|---------|
| Parsedown | `private/Parsedown.php` | The MIT (expat) License (MIT), Copyright (c) 2013-2018 Emanuil Rusev, erusev.com|
| ForkAwesome | linkato esternamente | <https://forkaweso.me/Fork-Awesome/license/> |
| bootstrapgrid | `assets/bootstrap-grid.min.css` | MIT (expat) Bootstrap framework, Twitter Copyright 2011-2016 <https://github.com/dmhendricks/bootstrap-grid-css> |