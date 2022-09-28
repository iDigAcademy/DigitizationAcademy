/*
 * Copyright (c) 2022. Digitization Academy
 * idigacademy@gmail.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

document.addEventListener("DOMContentLoaded", () => {
    [...document.querySelectorAll('.sidebar-section-title')].forEach(item => {
        if(item.href === undefined) return;

        if (item.href.includes('/nova') === 0) {
            console.log(item.href.value);
            return;
        }

        let newItem = Object.assign(
            document.createElement('a'),
            {
                classList: item.className,
                innerHTML: item.innerHTML,
                href: item.href
            }
        );

        item.parentNode.replaceChild(newItem, item);
    })
});
