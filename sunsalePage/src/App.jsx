import './App.css'
import AboutSection from './components/AboutSection/AboutSection'
import AuthoritySection from './components/AuthoritySection/AuthoritySection'
import FeaturedProjectsSection from './components/FeaturedProjectsSection/FeaturedProjectsSection'
import Footer from './components/Footer/Footer'
import Header from './components/Header/Header'
import HeroSection from './components/HeroSection/HeroSection'
import ServicesSection from './components/ServicesSection/ServicesSection'
import WhatsAppWidget from './components/WhatsAppWidget/WhatsAppWidget'


function App() {
  
  return (
    <>
      <Header />
      <HeroSection />
      <AboutSection />
      <ServicesSection />
      <AuthoritySection />
      <FeaturedProjectsSection />
      <Footer />
      <WhatsAppWidget />
    </>
  )
}

export default App
