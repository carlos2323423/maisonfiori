// En el archivo MenuItem.js

import React from 'react';

const MenuItem = ({ icon, children }) => {
  return (
    <div className="menu-item">
      <div className="menu-icon">{icon}</div>
      <div className="menu-label">{children}</div>
    </div>
  );
};

export default MenuItem;
