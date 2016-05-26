using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Dadart.BLL.Model.Catalog
{
    public class Product
    {
        public Guid ProductId { get; set; }
        public string Name { get; set; }
        public string ShortDescription { get; set; }
        public byte[] Thumb { get; set; }
        public DateTime Date { get; set; }
        public Guid ArtistId { get; set; }
        
    }
}
