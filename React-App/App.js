import React from 'react';
import './App.css';
import Create from './create';
import Read from './read';
import Update from './update';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import { Link } from 'react-router-dom';
import { Button } from 'semantic-ui-react';



function App() {
  return (
  <Router>
      <div className="main">
        <h2 className="main-header">User Management</h2>
        <Link to={`/`}><Button className='top-button'>Home</Button></Link>
        
        <Routes>
        
          <Route exact path='/create' element={<Create/>} />
        
        
          <Route exact path='/' element={<Read/>} />
        

          <Route exact path='/update' element={<Update/>} />
          
          </Routes>
      </div>
    </Router>
    
    
  );
}

export default App;