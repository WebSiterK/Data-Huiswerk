class Persoon:
    def __init__(self, naam, leeftijd, geslacht, isStudent, gemiddeldCijfer):
        self.naam = naam
        self._leeftijd = leeftijd
        self.__geslacht = geslacht
        self.isStudent = isStudent
        self.gemiddeldCijfer = gemiddeldCijfer

    def leeftijd(self):
        return self._leeftijd
        
    def leeftijd(self, value):
        if type(value) == int and value >= 0:
            self._leeftijd = value
        else:
            raise ValueError("Leeftijd moet een positief getal zijn")
                
    def print_persoonlijke_informatie(self):
        print(f"Naam: {self.naam}") 
        print(f"Leeftijd: {self.leeftijd}")
        print(f"Geslacht: {self.__geslacht}") # Geslacht is privé attribuut
        print(f"Is student?: {self.isStudent}")
        print(f"Gemiddelde cijfer: {self.gemiddeldCijfer}")