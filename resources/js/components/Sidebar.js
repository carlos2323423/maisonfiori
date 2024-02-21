// resources/js/components/Sidebar.js
import React from 'react';
import MenuItem from './MenuItem';  // Asegúrate de importar el componente MenuItem o adaptar la importación según tu estructura
// Importa los iconos necesarios
import HomeOutlinedIcon from '@material-ui/icons/HomeOutlined';
import PeopleOutlinedIcon from '@material-ui/icons/PeopleOutlined';

const Sidebar = () => {
  return (
    <div>
      <MenuItem icon={<HomeOutlinedIcon />}>Home</MenuItem>
      <MenuItem icon={<PeopleOutlinedIcon />}>Team</MenuItem>
      <MenuItem icon={<ContactsOutlinedIcon />}>Contacts</MenuItem>
      <MenuItem icon={<ReceiptOutlinedIcon />}>Profile</MenuItem>
      <MenuItem icon={<HelpOutlineOutlinedIcon />}>FAQ</MenuItem>
      <MenuItem icon={<CalendarTodayOutlinedIcon />}>Calendar</MenuItem>

      <main>
        <h1 style={{ color: 'white', marginLeft: '5rem' }}>
          React-Pro-Sidebar
        </h1>
      </main>
    </div>
  );
};

export default Sidebar;
